<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;

class PagesController extends Controller
{
    public function home()
    {
        $nama = "kamu";
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
}

?>