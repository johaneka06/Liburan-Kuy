<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use \App\User;

class ProfileController extends Controller
{
    public function profile()
    {
        $name = Auth::user()->name . " " . Auth::user()->last_name;
        $email = Auth::user()->email;
        $phone_no = Auth::user()->phone_no;
        return view('user/akun', ['name' => $name, 'email' => $email, 'phone_no' => $phone_no]);
    }

    public function order()
    {
        $id = Auth::user()->id;
        $name = Auth::user()->name . " " . Auth::user()->last_name;
        return view('user/order-hist', ['name' => $name]);
    }

    public function profileMan()
    {
        $id = Auth::user()->id;
        $name = Auth::user()->name . " " . Auth::user()->last_name;
        return view('user/profile-man', ['name' => $name]);
    }

    public function point()
    {
        $id = Auth::user()->id;
        $name = Auth::user()->name . " " . Auth::user()->last_name;
        return view('user/poin', ['name' => $name]);
    }

    public function setting()
    {
        $id = Auth::user()->id;
        $email = Auth::user()->email;
        $phone_no = Auth::user()->phone_no;
        $fName = Auth::user()->name;
        $lname = Auth::user()->last_name;
        $name = Auth::user()->name . " " . Auth::user()->last_name;
        return view('user/setting', ['name' => $name, 'email' => $email, 'phone_no' => $phone_no, 'oldFirstName' => $fName, 'oldLastName' => $lname]);
    }

    public function phoneNoChanges(Request $request)
    {
        if ($request->newPhoneNo != $request->confPhoneNo)
            Alert::error('Error', 'Konfirmasi Nomor HP Tidak Sama!');
        else if (DB::table('users')->where('phone_no', '=', $request->newPhoneNo) != null) Alert::error('Error', 'Nomor HP Sudah Ada');
        else {
            $id = Auth::user()->id;
            $update = DB::table('users')
                ->where('id', $id)
                ->update(['phone_no' => $request->newPhoneNo]);

            toast('Sukses mengupdate nomor hp', 'success');
        }

        return redirect('/user/profile/settings');
    }

    public function passwordChanges(Request $request)
    {
        if (Hash::check($request->old, Auth::user()->password) && !Hash::check($request->new, Auth::user()->password)) {
            $user_id = Auth::User()->id;
            $obj_user = User::find($user_id);
            $obj_user->password = bcrypt($request->new);
            $obj_user->save();
            toast('Sukses mengubah password', 'success');
        } else if (!Hash::check($request->old, Auth::user()->password)) {
            Alert::error('Password doesn\'t match', 'Password saat ini tidak sama dengan data anda');
        } else if (Hash::check($request->new, Auth::user()->password)) {
            Alert::error('Same Password', 'Password baru anda sama dengan password lama anda. Ubah dengan password yang berbeda.');
        }
        return redirect('/user/profile/settings');
    }

    public function dataChanges(Request $request)
    {
        $user_id = Auth::User()->id;
        $obj_user = User::find($user_id);
        $obj_user->name = $request->fName;
        $obj_user->last_name = $request->lName;
        $obj_user->save();
        toast('Sukses mengubah data nama', 'success');
    }
}
