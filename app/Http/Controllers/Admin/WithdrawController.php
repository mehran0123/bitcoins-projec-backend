<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Deposit;
use App\Models\Withdraw;
use App\Models\User;
class WithdrawController extends Controller
{
    public function index()
    {
        if(Auth::user()->user_role == 1){
           $deposits = Withdraw::orderBy('id','DESC')->get();
        }else{
           $deposits = Withdraw::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
        }

        return view('admin.withdraws.index',compact('deposits'));
    }
    //LOAD CREATE VIEW//
    public function create()
    {
        return view('admin.withdraws.create');
    }
    //CREATE PROCESS START HERE//
    public function create_process(Request $request)
    {
      //  return $request->all();
        $deposit = new Withdraw ;
        $deposit->amount = $request->deposit_amount;
        $deposit->slip = $request->file('slip')->store('SlipImages');
        $deposit->user_id = Auth::user()->id;
        $deposit->save();

        //**UPDATING POINTS HERE*/
         $depositer_points = User::where('id',Auth::user()->id)->first();
         $total_points = $request->deposit_amount + $depositer_points->total_points;
         User::where('id',Auth::user()->id)->update(['total_points' =>  $total_points]);

        //**UPDATING Sponcered POINTS HERE*/
        if($depositer_points->sponcer_by !=''){
           $reffer = User::where('left_code',$depositer_points->sponcer_by)->first();
            if($reffer){
                $total_points = $reffer->left_points + ($request->deposit_amount / 100) * 5;  // 5% of deposit amount
                 User::where('id',$reffer->id)->update(['left_points' =>  $total_points]);
            }else{
                $total_points = $reffer->right_points + ($request->deposit_amount / 100) * 5;  // 5% of deposit amount
                 User::where('id',$reffer->id)->update(['right_points' =>  $total_points]);
            }
        }
        return 'true';
    }
     //LOAD EDIT VIEW//
     public function edit($id)
     {
        $deposit = Withdraw::where('id', $id)->first();
         return view('admin.withdraws.edit',compact('deposit'));
     }
     //update Process start here//
     public function update(Request $request)
     {

        $deposit = Withdraw::where('id', $request->id)->first();
        $deposit->amount = $request->deposit_amount;
        $deposit->slip = $request->hasFile('slip') ? $request->file('slip')->store('SlipImages') : $deposit->slip ;
        $deposit->save();

        return 'true';
     }
     //for changing status
     public function change_status(Request $request){
        $ctype = Withdraw::where('id', $request->id)->first();

        if ($ctype->status == 1) {
            Withdraw::where('id', $request->id)->update(['status' => 0]);
        } else {
            Withdraw::where('id', $request->id)->update(['status' => 1]);
        }

        echo $ctype->status;
    }
    //TODO: DELETE DEPOSITS
    public function delete(Request $request)
    {
        Deposit::where('id', $request->id)->delete();
    }
}
