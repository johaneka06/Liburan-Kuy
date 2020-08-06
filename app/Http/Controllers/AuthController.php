<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Ramsey\Uuid\Uuid;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth/login');
    }

    public function getRegister()
    {
        return view('auth/register');
    }

    public function postLogin(Request $request)
    {
        if(DB::table('users')->where('email', '=', $request->uniqeIdent)->exists())
        {
            return view('auth/password', ['ident' => $request->uniqeIdent]);
        }
        else if(DB::table('users')->where('phone_no', '=', $request->uniqeIdent)->exists())
        {
            return view('auth/password', ['ident' => $request->uniqeIdent]);
        }

        Alert::error('No Match', 'No record match with your identifier');
        return redirect('/login');
    }

    public function postPassword(Request $request)
    {
        //dd($request->all());
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]) || Auth::attempt(['phone_no' => $request->email, 'password' => $request->password]))
        {
            $user = DB::table('users')
                ->where('email', '=', $request->email)
                ->orWhere('phone_no', '=', $request->email)
                ->first();

            return redirect('/');
        }
        Alert::error('Wrong credentials', 'Email / Phone No / Password doesn\'t match with the database');
        return redirect('/login');
    }

    public function postRegister(Register $request)
    {
        $validatedData = $request->validated();        

        if(DB::table('users')->where('email', '=', $request->email)->exists())
        {
            Alert::info('Email Found', 'Your email has been found and match with the database');
            return redirect('/login');
        }
        else if(DB::table('users')->where('phone_no', '=', $request->phone_no)->exists())
        {
            Alert::info('Phone Number Found', 'Your phone no has been found and match with the database');
            return redirect('/login');
        }

        $user = new \App\User;
        $user->name = $request->fName;
        $user->last_name = $request->lName;
        $user->phone_no = $request->nomorHp;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(10);
        $user->save();

        $profile = new \App\Profile_List;
        $profile->id = Uuid::uuid4();
        $profile->user_id = DB::table('users')->where('phone_no', '=', $request->nomorHp)->first()->id;
        $profile->name = $request->fName;
        $profile->last_name = $request->lName;
        $profile->phone_no = $request->nomorHp;
        $profile->email = $request->email;
        $profile->save();

        Auth::attempt($request->only('email', 'password'));
        toast('Your account has been created successfully','success');
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

?>