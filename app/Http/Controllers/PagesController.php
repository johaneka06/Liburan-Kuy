<?php

namespace App\Http\Controllers;

use App\Airport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
        if(Auth::user() != null) $nama = Auth::user()->name;
        Alert::error('Cannot Access', 'This Feature is Under Development Process');
        return view('index', ['name' => $nama]);
    }

    public function hotel()
    {
        $nama = "kamu";
        if(Auth::user() != null) $nama = Auth::user()->name;
        Alert::error('Cannot Access', 'This Feature is Under Development Process');
        return view('index', ['name' => $nama]);
    }

    public function train()
    {
        $nama = "kamu";
        if(Auth::user() != null) $nama = Auth::user()->name;
        Alert::error('Cannot Access', 'This Feature is Under Development Process');
        return view('index', ['name' => $nama]);
    }

    public function profile()
    {
        $name = Auth::user()->name." ".Auth::user()->last_name;
        $email = Auth::user()->email;
        $phone_no = Auth::user()->phone_no;
        return view('user/akun', ['name' => $name, 'email' => $email, 'phone_no' => $phone_no]);
    }

    public function autocomplete(Request $request)
    {
        $items = Airport::where('ICAO', 'LIKE', "%{$request->query('q')}%")->orWhere('name', 'LIKE', "%{$request->query('q')}%")->get();

        return response()->json($items);
    }
}

?>