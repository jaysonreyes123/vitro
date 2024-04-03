<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Hr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login($type)
    {
        $login_file = "";
        switch ($type) {
            case 'hr':
            case 'employee':
                $login_file = "auth.login";
                break;
            default:
                return abort(404);
        }
        $type = ucfirst($type);
        return view($login_file, compact(['type']));
    }

    public function process($type, Request $request)
    {
        $auth = null;
        $credential = [
            'username' =>  $request->get('username'),
            'password' =>  $request->get('password')
        ];
        switch ($type) {
            case 'Hr':
                $auth = auth()->guard('admin')->attempt($credential, false);
                break;
            case 'Employee':
                $auth = auth()->guard('web')->attempt($credential, false);
                break;
        }

        if ($auth) {
            $type = strtolower($type);
            return redirect("/" . $type . "/index");
        } else {
            return redirect()->back()->with('error-message', "Invalid Credential");
        }
    }
}
