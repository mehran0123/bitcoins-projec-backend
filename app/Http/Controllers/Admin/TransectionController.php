<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Withdraw;


class TransectionController extends Controller
{

    public function index()
    {
        if(Auth::user()->user_role != 1){
            return '404,Unauthorized User';
        }

        $users = User::where('user_role',2)->orderBy('id','DESC')->get();

        return view('admin.users.index',compact('users'));
    }
    
     public function transactions()
     {
         //foradmin
         $adtransdeposit = Deposit::all();
        //  $adtranswith = Withdraw::all();
        //  if(is_array($adtransdeposit) && is_array($adtranswith)){
        //     $adtransall = array_merge($adtransdeposit,$adtranswith);
        //  }else if(is_array($adtransdeposit)){
        //     $adtransall = $adtransdeposit;
        //  }else{
        //      $adtransall = $adtranswith;
        //  }
        // $adtransall = $adtransall->sort();
        
        
         $id=Auth::user()->id;    
         $transdeposit = Deposit::where('user_id',$id)->get();
        //  $transwith = Withdraw::where('user_id',$id)->get();
        //  if(is_array($transdeposit) && is_array($transwith)){
        //     $transall = array_merge($transdeposit,$transwith);
        //  }else if(is_array($transdeposit)){
        //     $transall = $transdeposit;
        //  }else{
        //      $transall = $transwith;
        //  }
        // $transall = $transall->sort();
        //return $transdeposit;
        return view('admin.dashboard.transaction',compact('transdeposit','adtransdeposit'));
    
    }
         public function deposits_transactions()
     {
         //foradmin
         $adtransdeposit = Deposit::all();
        //  $adtranswith = Withdraw::all();
        //  if(is_array($adtransdeposit) && is_array($adtranswith)){
        //     $adtransall = array_merge($adtransdeposit,$adtranswith);
        //  }else if(is_array($adtransdeposit)){
        //     $adtransall = $adtransdeposit;
        //  }else{
        //      $adtransall = $adtranswith;
        //  }
        // $adtransall = $adtransall->sort();
        
        
         $id=Auth::user()->id;    
         $transdeposit = Deposit::where('user_id',$id)->get();
        //  $transwith = Withdraw::where('user_id',$id)->get();
        //  if(is_array($transdeposit) && is_array($transwith)){
        //     $transall = array_merge($transdeposit,$transwith);
        //  }else if(is_array($transdeposit)){
        //     $transall = $transdeposit;
        //  }else{
        //      $transall = $transwith;
        //  }
        // $transall = $transall->sort();
        //return $transdeposit;
        return view('admin.dashboard.deposits-report',compact('transdeposit','adtransdeposit'));
    
    }
    // //LOAD CREATE VIEW//
    // public function create()
    // {
    //     if(Auth::user()->user_role != 1){
    //         return '404,Unauthorized User';
    //     }
    //     return view('admin.users.create');
    // }
    // //CREATE PROCESS START HERE//
    // public function create_process(Request $request)
    // {
    //     $checkEmail=User::where('email',$request->email)->first();
    //     if(!empty($checkEmail)) return 'email';
    //     $user= new User ;
    //     $user->first_name = $request->first_name;
    //     $user->last_name = $request->last_name;
    //     $user->email  = $request->email;
    //     $user->phone = $request->phone;
    //     $user->password = $request->password;
    //     $user->real_password = $request->password;
    //     $user->id_card_number = $request->cnic_number;
    //     $user->sponcer_by = $request->sponcer_by;
    //     $user->save();
    //     $right_code = random_int(10000, 99999).$user->id;
    //     $left_code = $user->id.random_int(10000, 99999);
    //     User::where('id',$user->id)->update(['left_code' => $left_code,'right_code' => $right_code]);
    //     return 'true';
    // }
    //  //LOAD EDIT VIEW//
    //  public function edit($id)
    //  {
    //     if(Auth::user()->user_role != 1){
    //         $user = User::where('id', $id)->first();
    //         return view('admin.users.edit',compact('user'));
    //     }
    //     $user = User::where('id', $id)->first();
    //      return view('admin.users.edit',compact('user'));
    //  }
    //  //update Process start here//
    //  public function update(Request $request)
    //  {
    //      //CHECK DUPLICATE EMAIL And USER ROLES//
    //      $checkResource = User::where('user_role',2)->get();
    //      //checking for duplicates Values
    //      foreach ($checkResource as $pro)
    //       {
    //         // for duplidate email
    //          if ($request->email == $pro->email){
    //             if ($request->id != $pro->id) {
    //                 return 'email';
    //             }
    //           }
    //         }
    //     $user = User::where('id', $request->id)->first();
    //     $user->first_name = $request->first_name;
    //     $user->last_name = $request->last_name;
    //     $user->email  = $request->email;
    //     $user->phone = $request->phone;
    //     $user->password = $request->password;
    //     $user->real_password = $request->password;
    //     $user->id_card_number = $request->cnic_number;
    //     $user->sponcer_by = $request->sponcer_by;
    //     $user->save();
    //     return 'true';
    //  }
    //  //for changing status
    //  public function change_status(Request $request){
    //     $ctype = User::where('id', $request->id)->first();

    //     if ($ctype->is_active == 1) {
    //         User::where('id', $request->id)->update(['is_active' => 0]);
    //     } else {
    //         User::where('id', $request->id)->update(['is_active' => 1]);
    //     }

    //     echo $ctype->is_active;
    // }
    // //TODO: DELETE User
    // public function delete(Request $request)
    // {
    //     User::where('id', $request->id)->delete();
    // }
}
