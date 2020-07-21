<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PagesController extends Controller
{
    public function home()
    {
        $nama = "kamu";
        if(Auth::user() != null) $nama = Auth::user()->name;
        return view('index', ['name' => $nama]);
    }

    public function plane()
    {
        $nama = "kamu";
        Alert::error('Cannot Access', 'This Feature is Under Development Process');
        return view('index', ['name' => $nama]);
    }

    public function hotel()
    {
        $nama = "kamu";
        Alert::error('Cannot Access', 'This Feature is Under Development Process');
        return view('index', ['name' => $nama]);
    }

    public function train()
    {
        $nama = "kamu";
        Alert::error('Cannot Access', 'This Feature is Under Development Process');
        return view('index', ['name' => $nama]);
    }

    public function profile()
    {
        $name = Auth::user()->name." ".Auth::user()->last_name;
        return view('user/akun', ['name' => $name]);
    }
}

?>