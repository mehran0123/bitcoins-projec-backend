<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class UserController extends Controller
{
    //loading user view
    public function index(){
        $user = User::where('id',Session::get('user')->id)->first();
        return view('web.user.index', compact('user'));
    }

    //loading edit profile view
    public function edit(){
        $user = User::where('id',Session::get('user')->id)->first();
        return view('web.user.edit',compact('user'));
    }


    //checking old password is correct or not
    public function check_old_password(Request $request)
    {
        $id = Session::get('user')->id;
        $user = User::find($id);

        $check = Hash::check($request->password, $user->password);

        if ($check == false) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

    //changing password here
    public function change_password(Request $request)
    {
        $id = Session::get('user')->id;
        $user = User::find($id);

        $user->password = $request->password;
        $user->update();
    }

    //update profile
    public function update(Request $request){

        //checking duplicated email here
        $users = User::all();

        foreach ($users as $user) {

            if ($request->email == $user->email) {
                if (Session::get('user')->id != $user->id) {
                    echo 'failed';
                    return;
                }
            }
        }

        $user = User::find(Session::get('user')->id);
        $user->name = $request->full_name;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->zip = $request->zip;
        $user->address = $request->address;
        $user->dob = $request->dob;
        if(isset($request->description)){
            $user->description = $request->description;
        }
        $user->save();
    }
}
