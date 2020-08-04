<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use \Illuminate\Support\Carbon;
use Ramsey\Uuid\Uuid;
use \App\User;
use \App\Profile_List;
use \App\Transaction;
use Illuminate\Support\Facades\Date;

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
        $date = date('Y-m-d', strtotime('-30 days'));
        $today = Carbon::parse(Date::today())->format('Y-m-d');
        $items = Transaction::where([
            ['user_id', '=', $id],
            ['dep_date', '<=', $today],
            ['dep_date', '>=', $date]
        ])->get();
        $name = Auth::user()->name . " " . Auth::user()->last_name;
        return view('user/order-hist', ['name' => $name, 'items' => $items]);
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
        return redirect('/user/profile/settings');
    }

    public function retrieveProfile()
    {
        $user_id = Auth::User()->id;
        $profiles = Profile_List::where('user_id', '=', $user_id)->orderBy('created_at')->get();
        return view('user/profile-man', ['name' => Auth::User()->name." ".Auth::User()->last_name, 'profiles' => $profiles]);
    }

    public function getProfile($id)
    {
        $profile = Profile_List::where('id', '=', $id)->first();
        return view('user/profile-editor', ['name' => Auth::User()->name." ".Auth::User()->last_name, 'profile' => $profile]);
    }

    public function updateProfile($id, Request $request)
    {
        $profile = Profile_List::where('id', '=', $id)->first();
        $profile->name = $request->first;
        $profile->last_name = $request->last;
        $profile->email = $request->email;
        $profile->phone_no = $request->hp;
        $profile->updated_at = Carbon::now();
        $profile->save();
        toast('Sukses mengedit profile', 'success');
        return redirect('/user/manage-profile');
    }

    public function addProfile(Request $request)
    {
        $newProfile = new Profile_List;
        $newProfile->id = Uuid::uuid4();
        $newProfile->user_id = Auth::user()->id;
        $newProfile->name = $request->first;
        $newProfile->last_name = $request->last;
        $newProfile->phone_no = $request->phone;
        $newProfile->email = $request->email;
        $newProfile->save();
        Alert::success('Sukses', 'Sukses menambahkan profil baru: '.$newProfile->name." ".$newProfile->last_name);
        return redirect('/user/manage-profile');
    }

    public function getProfileData($id)
    {
        $deleted = Profile_List::where('id', '=', $id)->first();
        return view('user/delete-profile', ['name' => Auth::user()->name." ".Auth::user()->last_name, 'deleted' => $deleted]);
    }

    public function deleteProfile($id)
    {
        $deleted = Profile_List::where('id', '=', $id)->first();
        $name = $deleted->name." ".$deleted->last_name;
        $deleted->delete();
        toast('Sukses menghapus profil '.$name, 'success');
        return redirect('/user/manage-profile');
    }

    public function find(Request $request) {
        $id = Auth::user()->id;
        $start = Carbon::parse($request->start)->format('Y-m-d');
        $end = Carbon::parse($request->end)->format('Y-m-d');
        $items = Transaction::where([
            ['user_id', '=', $id],
            ['dep_date', '>=', $start],
            ['dep_date', '<=', $end]
        ])->get();
        $name = Auth::user()->name . " " . Auth::user()->last_name;
        return view('user/order-hist', ['name' => $name, 'items' => $items]);
    }
}
