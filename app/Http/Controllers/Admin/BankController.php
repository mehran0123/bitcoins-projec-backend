<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class BankController extends Controller
{

    public function index()
    {
        if(Auth::user()->user_role != 1){
            return '404,Unauthorized User';
        }

        $banks = Bank::orderBy('id','DESC')->get();

        return view('admin.banks.index',compact('banks'));
    }
    //LOAD CREATE VIEW//
    public function create()
    {
        if(Auth::user()->user_role != 1){
            return '404,Unauthorized User';
        }
        return view('admin.banks.create');
    }
    //CREATE PROCESS START HERE//
    public function create_process(Request $request)
    {
        $checkaccount_no = Bank::where('account_no',$request->account_no)->first();
        if(!empty($checkaccount_no)) return 'account_no';
        $user= new Bank;
        $user->type = $request->type;
        $user->title = $request->account_title;
        $user->account_no  = $request->account_no;
        $user->transection_fee = $request->transection_fee;
        $user->other_details = $request->other_details;
        $user->save();
        return 'true';
    }
     //LOAD EDIT VIEW//
     public function edit($id)
     {
         $bank = Bank::where('id', $id)->first();
         return view('admin.banks.edit',compact('bank'));
     }
     //update Process start here//
     public function update(Request $request)
     {
         //CHECK DUPLICATE account no//
         $banks = Bank::all();
         //checking for duplicates Values
         foreach ($banks as $bank)
          {
            // for duplidate account_no
             if ($request->account_no == $bank->account_no){
                if ($request->id != $bank->id) {
                    return 'account_no';
                }
              }
            }
        $user = Bank::where('id', $request->id)->first();
        $user->type = $request->type;
        $user->title = $request->account_title;
        $user->account_no  = $request->account_no;
        $user->transection_fee = $request->transection_fee;
        $user->other_details = $request->other_details;
        $user->save();
        return 'true';
     }
     //for changing status
     public function change_status(Request $request){
        $ctype = Bank::where('id', $request->id)->first();

        if ($ctype->is_active == 1) {
            Bank::where('id', $request->id)->update(['is_active' => 0]);
        } else {
            Bank::where('id', $request->id)->update(['is_active' => 1]);
        }

        echo $ctype->is_active;
    }
    //TODO: DELETE Bank
    public function delete(Request $request)
    {
        Bank::where('id', $request->id)->delete();
    }
}
