<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AdministrationsController extends Controller
{
    public function index()
    {

        $administrations=User::where('user_role','!=',1)->where('user_role','!=',2)->orderBy('id','DESC')->get();
       // return $administrations;
        return view('admin.administrations.index',compact('administrations'));
    }
    //LOAD CREATE VIEW//
    public function create()
    {
        return view('admin.administrations.create');
    }
    //CREATE PROCESS START HERE//
    public function create_process(Request $request)
    {
        $checkEgineerRequest=User::where('user_role',$request->user_role)->first();
        $checkEmail=User::where('email',$request->email)->first();
        if(!empty($checkEgineerRequest)) return 'UserRole';
        if(!empty($checkEmail)) return 'email';
        $user= new User ;
        $user->name= $request->name;
        $user->email= $request->email;
        $user->phone= $request->phone;
        $user->password= $request->password;
        $user->c_password= $request->password;
        $user->user_role= $request->user_role;
        $user->save();
        return 'true';
    }
     //LOAD EDIT VIEW//
     public function edit($id)
     {
        $user = User::where('id', $id)->first();
         return view('admin.administrations.edit',compact('user'));
     }
     //update Process start here//
     public function update_process(Request $request)
     {
         //CHECK DUPLICATE EMAIL And USER ROLES//
         $checkResource = User::all();
         //checking for duplicates Values
         foreach ($checkResource as $pro)
          {
            // for duplidate UserRole
             if ($request->user_role == $pro->user_role){
                 if ($request->id != $pro->id) {
                     return 'UserRole';
                 }
               }
               // for duplidate email
             if ($request->email == $pro->email){
                if ($request->id != $pro->id) {
                    return 'email';
                }
              }
            }
        $user = User::where('id', $request->id)->first();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->phone= $request->phone;
        $user->password= $request->password;
        $user->c_password= $request->password;
        $user->user_role= $request->user_role;
        $user->save();
        return 'true';
     }
     //for changing status
     public function change_status(Request $request){
        $ctype = User::where('id', $request->id)->first();

        if ($ctype->is_active == 1) {
            User::where('id', $request->id)->update(['is_active' => 0]);
        } else {
            User::where('id', $request->id)->update(['is_active' => 1]);
        }

        echo $ctype->is_active;
    }
    //TODO: DELETE User
    public function delete(Request $request)
    {
        User::where('id', $request->id)->delete();
    }
}
