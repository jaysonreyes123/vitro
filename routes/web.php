<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Hr\DashboardController;
use App\Http\Controllers\Hr\EmployeeController as HrEmployeeController;
use App\Http\Controllers\HrController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/login", function () {
    return view('auth.login');
});
Route::get("/register", function () {
    return view('auth.register');
});

Route::group(['prefix' => 'dashboard'], function () {
    Route::get("/", function () {
        return view('content.dashboard');
    });
    Route::get("/test", function () {
        var_dump(Route::getCurrentRoute()->getAction()['prefix']);
    })->name('test');
});


//login
Route::middleware(['guest'])->group(function () {
    Route::get("/{type?}/login",    [UserController::class, 'login'])->name('login');
    Route::post("/{type}/process",  [UserController::class, 'process']);
});



//hr
Route::group(["prefix" => "hr"], function () {
    Route::get("/", function () {
        return redirect("hr/dashboard");
    });
    Route::get("/logout",               [HrController::class, 'logout']);

    //dashboard
    Route::get("/dashboard",            [DashboardController::class, 'index']);

    //employee 
    Route::get("/employee",             [HrEmployeeController::class, 'index']);
    Route::get("/employee/list",        [HrEmployeeController::class, 'list']);
});


//employee
Route::get("/employee/index",           [EmployeeController::class, 'index']);
