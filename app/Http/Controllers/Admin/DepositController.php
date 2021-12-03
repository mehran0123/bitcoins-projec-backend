<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    public function index()
    {
        if(Auth::user()->user_role == 1){
           $deposits = Deposit::orderBy('id','DESC')->get();
        }else{
           $deposits = Deposit::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
        }

        return view('admin.deposits.index',compact('deposits'));
    }
    //LOAD CREATE VIEW//
    public function create()
    {
        return view('admin.deposits.create');
    }
    //CREATE PROCESS START HERE//
    public function create_process(Request $request)
    {
        $deposit = new Deposit ;
        $deposit->amount = $request->amount;
        $deposit->slip = $request->file('slip')->store('SlipImages');
        $deposit->user_id = Auth::user()->id;
        $deposit->save();
        return 'true';
    }
     //LOAD EDIT VIEW//
     public function edit($id)
     {
        $user = Deposit::where('id', $id)->first();
         return view('admin.deposits.edit',compact('user'));
     }
     //update Process start here//
     public function update(Request $request)
     {

        $deposit = Deposit::where('id', $request->id)->first();
        $deposit->amount = $request->amount;
        $deposit->slip = $request->hasFile('slip') ? $request->file('slip')->store('SlipImages') : $deposit->slip ;
        $deposit->save();

        return 'true';
     }
     //for changing status
     public function change_status(Request $request){
        $ctype = Deposit::where('id', $request->id)->first();

        if ($ctype->is_active == 1) {
            Deposit::where('id', $request->id)->update(['is_active' => 0]);
        } else {
            Deposit::where('id', $request->id)->update(['is_active' => 1]);
        }

        echo $ctype->is_active;
    }
    //TODO: DELETE DEPOSITS
    public function delete(Request $request)
    {
        Deposit::where('id', $request->id)->delete();
    }
}
