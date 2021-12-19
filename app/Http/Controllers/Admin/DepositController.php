<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\User;
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
      //  return $request->all();
        $deposit = new Deposit ;
        $deposit->amount = $request->deposit_amount;
        $deposit->slip = $request->file('slip')->store('SlipImages');
        $deposit->user_id = Auth::user()->id;
        $deposit->save();

        //**UPDATING POINTS HERE*/
         $depositer_points = User::where('id',Auth::user()->id)->first();

         $total_points = $request->deposit_amount + $depositer_points->total_points;

        //  User::where('id',Auth::user()->id)->update(['total_points' =>  $total_points]);

        $flag = 0;

        while($flag == 0){
             //**UPDATING Sponcered POINTS HERE*/
            if($depositer_points->sponcer_by !=''){

                $reffer = User::where('left_code',$depositer_points->sponcer_by)->first();

                if($reffer){

                    $total_points = $reffer->left_points + $request->deposit_amount;  // 5% of deposit amount

                    User::where('id',$reffer->id)->update(['left_points' =>  $total_points]);

                    $depositer_points = $reffer;
                }else{
                   $reffer = User::where('right_code',$depositer_points->sponcer_by)->first();

                    $total_points = $reffer->right_points + $request->deposit_amount;  // 5% of deposit amount

                    User::where('id',$reffer->id)->update(['right_points' =>  $total_points]);

                    $depositer_points = $reffer;

                }
            }else{
                $flag = 1;
                 break;
            }
        }

        return 'true';
    }
     //LOAD EDIT VIEW//
     public function edit($id)
     {
        $deposit = Deposit::where('id', $id)->first();
         return view('admin.deposits.edit',compact('deposit'));
     }
     //update Process start here//
     public function update(Request $request)
     {

        $deposit = Deposit::where('id', $request->id)->first();
        $deposit->amount = $request->deposit_amount;
        $deposit->slip = $request->hasFile('slip') ? $request->file('slip')->store('SlipImages') : $deposit->slip ;
        $deposit->save();

        return 'true';
     }
     //for changing status
     public function change_status(Request $request){
        $ctype = Deposit::where('id', $request->id)->first();

        if ($ctype->status == 1) {
            Deposit::where('id', $request->id)->update(['status' => 0]);
        } else {
            Deposit::where('id', $request->id)->update(['status' => 1]);
        }

        echo $ctype->status;
    }
    //TODO: DELETE DEPOSITS
    public function delete(Request $request)
    {
        Deposit::where('id', $request->id)->delete();
    }
}
