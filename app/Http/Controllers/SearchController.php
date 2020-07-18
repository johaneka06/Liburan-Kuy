<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

class SearchController extends Controller
{
    public function postFlightData(Request $request)
    {
        dd('Success move here');
        $nama = "kamu";
        return view('index', ['name' => $nama]);
    }
}

?>