<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $name = Auth::user()->name." ".Auth::user()->last_name;
        return view('user/akun', ['name' => $name]);
    }

    public function order()
    {
        $id = Auth::user()->id;
        $name = Auth::user()->name." ".Auth::user()->last_name;
        return view('user/order-hist', ['name' => $name]);
    }

    public function profileMan()
    {
        $id = Auth::user()->id;
        $name = Auth::user()->name." ".Auth::user()->last_name;
        return view('user/profile-man', ['name' => $name]);
    }

    public function point()
    {
        $id = Auth::user()->id;
        $name = Auth::user()->name." ".Auth::user()->last_name;
        return view('user/poin', ['name' => $name]);
    }
}
