<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //loading users view here
    public function index(){
        $users = User::where('user_role',2)->get();
        return view('admin.users.index', compact('users'));
    }

      //delete user
      public function delete_user(Request $request)
      {
          User::find($request->id)->delete();
      }

       //change User status
    public function change_User_status(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        if ($user->is_active == 1) {
            User::where('id', $request->id)->update(['is_active' => 0]);
        } else {
            User::where('id', $request->id)->update(['is_active' => 1]);
        }

        echo $user->is_active;
    }
}
