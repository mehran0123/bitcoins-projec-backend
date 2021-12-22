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
        $deposit = new Deposit ;
        $deposit->amount = $request->deposit_amount;
        $deposit->slip = $request->file('slip')->store('SlipImages');
        $deposit->user_id = Auth::user()->id;
        $deposit->save();

        //**UPDATING POINTS HERE*/
         $depositer_points = User::where('id',Auth::user()->id)->first();
         $depositer_parent = User::where('id',Auth::user()->id)->first();
         $total_points = $request->deposit_amount + $depositer_points->total_points;

         $parent_node = User::where('left_code',$depositer_points->sponcer_by)->first();

         if($parent_node){

            $total_points = $parent_node->bonus_points + ($request->deposit_amount * 0.05);  // 5% of deposit amount

            User::where('id',$parent_node->id)->update(['bonus_points' =>  $total_points]);

        }else{

           $parent_node = User::where('right_code',$depositer_points->sponcer_by)->first();

            $total_points = $parent_node->bonus_points + ($request->deposit_amount * 0.05);  // 5% of deposit amount

            User::where('id',$parent_node->id)->update(['bonus_points' =>  $total_points]);

        }

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

        $bst_flag = 0;
        $bst_points = 0;
        while($bst_flag == 0){
             //**UPDATING Sponcered POINTS HERE*/
            if($depositer_parent->sponcer_by !=''){
                $reffer = User::where('left_code',$depositer_parent->sponcer_by)->first();
                $right_reffer = User::where('right_code',$depositer_parent->sponcer_by)->first();
                //reffer is parent node of current node
                if($reffer){
                    //****APPLYING VALIDATION FOR BST****//
                    if($reffer->left_points != 0 &&  $reffer->right_points != 0){
                        // 170 - 200 => -30
                        // (170 * 2) * 4%
                      $bst_points =   $reffer->left_points - $reffer->right_points;
                      if($bst_points <= 0 ){
                        $bst_bonus =  $reffer->left_points  * 2;
                        $bst_bonus = ($bst_bonus / 100) * 4 ;
                        $bst_bonus = $reffer->bonus_points + $bst_bonus;
                       User::where('id',$reffer->id)->update(['bonus_points' => $bst_bonus]);
                      }else{
                        $bst_bonus =  $reffer->right_points * 2;
                        $bst_bonus = ($bst_bonus / 100) * 4 ;
                        $bst_bonus = $reffer->bonus_points + $bst_bonus;
                        User::where('id',$reffer->id)->update(['bonus_points' => $bst_bonus]);
                      }
                    }
                    //****APPLYING VALIDATION FOR BST****//
                }else if($right_reffer){
                    if($right_reffer->left_points != 0 &&  $right_reffer->right_points != 0){
                        $bst_points =   $right_reffer->left_points - $right_reffer->right_points;
                        if($bst_points <= 0 ){
                          $bst_points =   $right_reffer->right_points - $right_reffer->left_points ;
                          $bst_bonus =  $bst_points  * 2;
                          $bst_bonus = ($bst_bonus / 100) * 4 ;
                          $bst_bonus = $right_reffer->bonus_points + $bst_bonus;
                         User::where('id',$right_reffer->id)->update(['bonus_points' => $bst_bonus]);
                        }else{
                          $bst_bonus =  $right_reffer->right_points * 2;
                          $bst_bonus = ($bst_bonus / 100) * 4 ;
                          $bst_bonus = $right_reffer->bonus_points + $bst_bonus;
                          User::where('id',$right_reffer->id)->update(['bonus_points' => $bst_bonus]);
                          //***RANT CALCULTION START HERE */
                          if($reffer->totol_points == $right_reffer->total_points){

                            if($right_reffer->total_points >= 2000 && $right_reffer->total_points < 4500){

                                $rank_bonus = $depositer_parent->bonus_points + 100 ;

                                User::where('id',$depositer_parent->id)->update(['rank' => 'Bronze','bonus_points','bonus_points' => $rank_bonus]);

                            }elseif($right_reffer->total_points >= 4500 && $right_reffer->total_points < 10000){

                               // $rank_bonus = $depositer_parent->bonus_points + 100 ;    /// FOR BIKE//

                                User::where('id',$depositer_parent->id)->update(['rank' => 'Gold']);
                            }
                        }
                        //***RANT CALCULTION END HERE */
                      }
                }

             }
             $bst_flag = 1;
             break;
           // else{
            //     $bst_flag = 1;
            //      break;
            // }

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
