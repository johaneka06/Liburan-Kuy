<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('user/login');
    }

    public function getRegister()
    {
        return view('user/register');
    }

    public function postLogin(Request $request)
    {
        dd($request);
    }

    public function postRegister(Request $request)
    {
        dd($request->email);
    }
}

?>