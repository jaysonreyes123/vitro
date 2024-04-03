<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        return view('content.hr.employee');
    }
    public function list()
    {
        $model = User::all();
        return DataTables::of($model)
            ->addIndexColumn()
            ->make(true);
    }
}
