<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Session;

class SettingController extends Controller
{
    //loading settings main page
    public function index()
    {
        return view('admin.settings.index');
    }

    //loading change password view
    public function change_password()
    {
        return view('admin.settings.change-password');
    }

    //checking old password is correct or not
    public function check_old_password(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        $check = Hash::check($request->password, $user->password);

        if ($check == false) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

    //changing password here
    public function change_password_process(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        $user->password = $request->password;
        $user->update();
    }


    //updating user prorifle here
    public function update_profile(Request $request)
    {
        $email = $request->email;
        $id = Auth::user()->id;
        $user = User::find($id);
        $users = User::all();

        //checking the email of user

        foreach ($users as $usr) {
            //matching the email here
            if ($email == $usr->email) {
                //matching the user here
                if ($id == $usr->id) {
                } else {
                    return 'false';
                }
            }
        }

        //updating user profile here
        $user->name = $request->name;
        $user->email = $email;
        if ($request->hasFile('image')) {
            $user->image =  $request->file('image')->store('UserImages');
        }
        $user->update();
    }
}
