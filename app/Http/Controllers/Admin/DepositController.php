<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bank;
use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\Admin\Transection;
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
        //GETTING BANK DETAILS//
        $banks = Bank::where('is_active',1)->get();
        return view('admin.deposits.create',compact('banks'));
    }
    //CREATE PROCESS START HERE//
    public function create_process(Request $request)
    {
       // return $request->all();
        $deposit = new Deposit ;
        $deposit->amount = $request->deposit_amount;
        $deposit->slip = $request->file('slip')->store('SlipImages');
        $deposit->user_id = Auth::user()->id;
        $deposit->bank_id = $request->bank_id;
        $deposit->save();
    //     //**UPDATING POINTS HERE*/
    //      $depositer_points = User::where('id',Auth::user()->id)->first();
    //      $depositer_parent = User::where('id',Auth::user()->id)->first();
    //      $total_points = $request->deposit_amount + $depositer_points->total_points;
         
    //      if($depositer_points->sponcer_by){        
    //      $parent_node = User::where('left_code',$depositer_points->sponcer_by)->first();

    //      if($parent_node){

    //         $total_points = $parent_node->bonus_points + ($request->deposit_amount * 0.05);  // 5% of deposit amount

    //         User::where('id',$parent_node->id)->update(['bonus_points' =>  $total_points]);

    //     }else{

    //       $parent_node = User::where('right_code',$depositer_points->sponcer_by)->first();

    //         $total_points = $parent_node->bonus_points + ($request->deposit_amount * 0.05);  // 5% of deposit amount

    //         User::where('id',$parent_node->id)->update(['bonus_points' =>  $total_points]);

    //     }
    // }
    //     $flag = 0;

    //     while($flag == 0){
    //          //**UPDATING Sponcered POINTS HERE*/
    //         if($depositer_points->sponcer_by !=''){

    //             $reffer = User::where('left_code',$depositer_points->sponcer_by)->first();

    //             if($reffer){

    //                 $total_points = $reffer->left_points + $request->deposit_amount;  // 5% of deposit amount

    //                 User::where('id',$reffer->id)->update(['left_points' =>  $total_points]);

    //                 $depositer_points = $reffer;

    //             }else{
    //               $reffer = User::where('right_code',$depositer_points->sponcer_by)->first();

    //                 $total_points = $reffer->right_points + $request->deposit_amount;  // 5% of deposit amount

    //                 User::where('id',$reffer->id)->update(['right_points' =>  $total_points]);

    //                 $depositer_points = $reffer;

    //             }
    //         }else{
    //             $flag = 1;
    //              break;
    //         }
    //     }

    //     $bst_flag = 0;
    //     $bst_points = 0;
    //     // while($bst_flag == 0){
    //          //**UPDATING Sponcered POINTS HERE*/
    //         if($depositer_parent->sponcer_by !=''){
    //             $reffer = User::where('left_code',$depositer_parent->sponcer_by)->first();
    //             $right_reffer = User::where('right_code',$depositer_parent->sponcer_by)->first();
    //             //reffer is parent node of current node
    //             if($reffer){
    //                 //****APPLYING VALIDATION FOR BST****//
    //                 if($reffer->left_points != 0 &&  $reffer->right_points != 0){
    //                     // 170 - 200 => -30
    //                     // (170 * 2) * 4%
    //                   $bst_points =   $reffer->left_points - $reffer->right_points;
    //                   if($bst_points <= 0 ){
    //                     $bst_bonus =  $reffer->left_points  * 1;
    //                     $bst_bonus = ($bst_bonus / 100) * 4 ;
    //                     $bst_bonus = $reffer->bonus_points + $bst_bonus;
    //                   User::where('id',$reffer->id)->update(['bonus_points' => $bst_bonus]);
    //                   }else{
    //                     $bst_bonus =  $reffer->right_points * 1;
    //                     $bst_bonus = ($bst_bonus / 100) * 4 ;
    //                     $bst_bonus = $reffer->bonus_points + $bst_bonus;
    //                     User::where('id',$reffer->id)->update(['bonus_points' => $bst_bonus]);
    //                   }
    //                 }
    //                 //****APPLYING VALIDATION FOR BST****//
    //             }else if($right_reffer){
    //                 if($right_reffer->left_points != 0 &&  $right_reffer->right_points != 0){
    //                     $bst_points =   $right_reffer->left_points - $right_reffer->right_points;
    //                     if($bst_points <= 0 ){
    //                       $bst_points =   $right_reffer->right_points - $right_reffer->left_points ;
    //                       $bst_bonus =  $bst_points  * 1;
    //                       $bst_bonus = ($bst_bonus / 100) * 4 ;
    //                       $bst_bonus = $right_reffer->bonus_points + $bst_bonus;
    //                      User::where('id',$right_reffer->id)->update(['bonus_points' => $bst_bonus]);
    //                     }else{
    //                       $bst_bonus =  $right_reffer->right_points * 1;
    //                       $bst_bonus = ($bst_bonus / 100) * 4 ;
    //                       $bst_bonus = $right_reffer->bonus_points + $bst_bonus;
    //                       User::where('id',$right_reffer->id)->update(['bonus_points' => $bst_bonus]);
    //                       //***RANK CALCULTION START HERE */
    //                       if($reffer->total_points == $right_reffer->total_points){
    //                         //**FOR BRONZ RANK (2000-4449) */
    //                         if($right_reffer->total_points >= 2000 && $right_reffer->total_points < 4500 && $right_reffer->rank !='Bronze'){

    //                             $rank_bonus = $depositer_parent->bonus_points + 100 ;

    //                             User::where('id',$depositer_parent->id)->update(['rank' => 'Bronze','bonus_points' => $rank_bonus]);

    //                         }elseif($right_reffer->total_points >= 4500 && $right_reffer->total_points < 10000 && $right_reffer->rank !='Gold'){
    //                         //**FOR GOLD (4500-9999) */   =>   FOR BIKE
    //                             User::where('id',$depositer_parent->id)->update(['rank' => 'Gold']);
    //                         }elseif($right_reffer->total_points >= 10000 && $right_reffer->total_points < 20000 && $right_reffer->rank !='Platinum'){
    //                             //**FOR Platinum (10000-19999) */  =>   FOR Mobile
    //                                 User::where('id',$depositer_parent->id)->update(['rank' => 'Platinum']);
    //                         }elseif($right_reffer->total_points >= 20000 && $right_reffer->total_points < 40000 && $right_reffer->rank !='Team Manager'){
    //                             //**FOR Platinum (20000-39999) */  =>   FOR Team Manager
    //                                 $rank_bonus = $depositer_parent->bonus_points + 1200;
    //                                  User::where('id',$depositer_parent->id)->update(['rank' => 'Team Manager','bonus_points' => $rank_bonus]);
    //                         }elseif($right_reffer->total_points == 70000 && $right_reffer->rank !='Senior Manager'){
    //                             //**FOR Platinum (70000) */  =>   Senior Manager
    //                             $rank_bonus = $depositer_parent->bonus_points + 2500;
    //                             User::where('id',$depositer_parent->id)->update(['rank' => 'Senior Manager','bonus_points' => $rank_bonus]);
    //                         }elseif($right_reffer->total_points == 120000 && $right_reffer->rank !='Director'){
    //                             //**FOR Director (120000) */  =>   Director
    //                           // $rank_bonus = $depositer_parent->bonus_points + 2500;
    //                             User::where('id',$depositer_parent->id)->update(['rank' => 'Director']);
    //                         }elseif($right_reffer->total_points == 200000 && $right_reffer->rank !='Marketing Director'){
    //                             //**FOR Marketing Director (200000) */  =>   Director
    //                             $rank_bonus = $depositer_parent->bonus_points + 7000;
    //                             User::where('id',$depositer_parent->id)->update(['rank' => 'Marketing Director','bonus_points' => $rank_bonus]);
    //                         }elseif($right_reffer->total_points == 400000 && $right_reffer->rank !='Emerald'){
    //                             //**FOR Emerald (400000) */  =>   Emerald//
    //                             User::where('id',$depositer_parent->id)->update(['rank' => 'Emerald']);
    //                         }elseif($right_reffer->total_points == 800000 && $right_reffer->rank !='Dimaond'){
    //                             //**FOR Emerald (800000) */  =>   Emerald
    //                             $rank_bonus = $depositer_parent->bonus_points + 25000;
    //                             User::where('id',$depositer_parent->id)->update(['rank' => 'Dimaond','bonus_points' => $rank_bonus]);
    //                         }elseif($right_reffer->total_points == 1500000 && $right_reffer->rank !='Blue Dimaond'){
    //                             //**FOR Blue Dimaond (1500000) */  =>   Blue Dimaond
    //                             $rank_bonus = $depositer_parent->bonus_points + 35000;
    //                             User::where('id',$depositer_parent->id)->update(['rank' => 'Blue Dimaond','bonus_points' => $rank_bonus]);
    //                         }elseif($right_reffer->total_points == 2500000 && $right_reffer->rank !='Royal Dimaond'){
    //                             //**FOR Royal Dimaond (2500000) */  =>   Royal Dimaond
    //                             $rank_bonus = $depositer_parent->bonus_points + 15000;
    //                             User::where('id',$depositer_parent->id)->update(['rank' => 'Royal Dimaond','bonus_points' => $rank_bonus]);
    //                         }elseif($right_reffer->total_points == 5000000 && $right_reffer->rank !='Crown Dimaond'){
    //                             //**FOR Crown Dimaond (2500000) */  =>   Crown Dimaond
    //                             $rank_bonus = $depositer_parent->bonus_points + 100000;
    //                             User::where('id',$depositer_parent->id)->update(['rank' => 'Crown Dimaond','bonus_points' => $rank_bonus]);
    //                         }elseif($right_reffer->total_points == 10000000 && $right_reffer->rank !='Presidental Dimaond'){
    //                             //**FOR Presidental Dimaond (2500000) */  =>   Presidental Dimaond
    //                             // $rank_bonus = $depositer_parent->bonus_points + 10000000;
    //                             User::where('id',$depositer_parent->id)->update(['rank' => 'Presidental Dimaond']);
    //                         }elseif($right_reffer->total_points == 15000000 && $right_reffer->rank !='Int Presidental Dimaond'){
    //                             //**FOR Presidental Dimaond (2500000) */  =>  Int Presidental Dimaond
    //                             $rank_bonus = $depositer_parent->bonus_points + 10000000;
    //                             User::where('id',$depositer_parent->id)->update(['rank' => 'Int Presidental Dimaond','bonus_points' => $rank_bonus]);
    //                         }
    //                     }
    //                     //***RANT CALCULTION END HERE */
    //                   }
    //             }

    //          }
    //         //  $bst_flag = 1;
    //         //  break;
    //       // else{
    //         //     $bst_flag = 1;
    //         //      break;
    //         // }

    //     // }
    //     //***ADD RECORD IN TRANSECTION***//
    //     // $bank = Bank::where('type',$request->bank_id)->first();
    //     // if($bank){
    //     //     $transection = new Transection;
    //     //     $transection->type = 2;
    //     //     $transection->amount = $request->deposit_amount;
    //     //     $transection->transection_fee = $bank->transection_fee;
    //     //     $transection->method = $request->bank_id;
    //     //     $transection->save();
    //     // }

    //     //***ADD RECORD IN TRANSECTION END HERE***//
    // }
    return 'true';
}
     //LOAD EDIT VIEW//
     public function edit($id)
     {
        $banks = Bank::where('is_active',1)->get();
        $deposit = Deposit::where('id', $id)->first();
         return view('admin.deposits.edit',compact('deposit','banks'));
     }
     //update Process start here//
     public function update(Request $request)
     {

        $deposit = Deposit::where('id', $request->id)->first();
        $deposit->amount = $request->deposit_amount;
        $deposit->bank_id = $request->bank_id;
        $deposit->slip = $request->hasFile('slip') ? $request->file('slip')->store('SlipImages') : $deposit->slip ;
        $deposit->save();

        return 'true';
     }
     //for changing status
     public function change_status(Request $request){
        $ctype = Deposit::where('id', $request->id)->first();

        if ($ctype->status == 1) {
          //  Deposit::where('id', $ctype->id)->update(['status' => 0]);
        } else {
            Deposit::where('id', $ctype->id)->update(['status' => 1]);
         //**UPDATING POINTS HERE*/
         
         $depositer_points = User::where('id',$ctype->user_id)->first();
         $depositer_parent = User::where('id',$ctype->user_id)->first();
         $total_points = $ctype->amount + $depositer_points->total_points;
         
/*++++++++++++++++++++++++++++++++++++++++++    Direct-Bonus Start   ++++++++++++++++++++++++++++++++++++++++*/ 
         //if it has parent
         
         if($depositer_points->sponcer_by){        
         
         //get the parent node  
         
         $parent_node = User::where('left_code',$depositer_points->sponcer_by)->first();
         
         //if current is in left of its parent
         
         if($parent_node){
            
            $total_points = $parent_node->bonus_points + ($ctype->amount * 0.05);  // 5% of deposit amount

            User::where('id',$parent_node->id)->update(['bonus_points' =>  $total_points]);

        }else{
         
          //if current is in right of its parent
         
           $parent_node = User::where('right_code',$depositer_points->sponcer_by)->first();

            $total_points = $parent_node->bonus_points + ($ctype->amount * 0.05);  // 5% of deposit amount

            User::where('id',$parent_node->id)->update(['bonus_points' =>  $total_points]);

        }
    }
/*++++++++++++++++++++++++++++++++++++++++++    Direct-Bonus end   ++++++++++++++++++++++++++++++++++++++++*/

/*++++++++++++++++++++++++++++++++++++    L/R Points to Ancestors Start   ++++++++++++++++++++++++++++++++++++*/
        $flag = 0;

        while($flag == 0){
            
            //check if current has parent
            
            if($depositer_points->sponcer_by !=''){
       
                //find current's parent

                $reffer = User::where('left_code',$depositer_points->sponcer_by)->first();

                if($reffer){

                    $total_points = $reffer->left_points + $ctype->amount;  // 100% of deposit amount added as left points to parent

                    User::where('id',$reffer->id)->update(['left_points' =>  $total_points]);

                    $depositer_points = $reffer;

                }else{
                   
                    $reffer = User::where('right_code',$depositer_points->sponcer_by)->first();

                    $total_points = $reffer->right_points + $ctype->amount;  // 100% of deposit amount added as right points to parent

                    User::where('id',$reffer->id)->update(['right_points' =>  $total_points]);

                    $depositer_points = $reffer;

                }
            }else{
                $flag = 1;
                 break;
            }
        }

/*++++++++++++++++++++++++++++++++++++    L/R Points to Ancestors end   ++++++++++++++++++++++++++++++++++++*/

/*+++++++++++++++++++++++++++++++++    Binary Bonus to Ancestors Start   +++++++++++++++++++++++++++++++++++*/
        
         $depositer_points = User::where('id',$ctype->user_id)->first();
         $depositer_parent = User::where('id',$ctype->user_id)->first();
         $total_points = $ctype->amount + $depositer_points->total_points;
         
        $bst_flag = 0;
        
        $bst_points = 0;
        
         while($bst_flag == 0){
           
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
                
                  //    $bst_bonus = ($bst_bonus / 100) * 4 ;
                
                        $bst_bonus = ($bst_bonus) * 0.02 ;
                
                        $bst_bonus = $reffer->bonus_points + $bst_bonus;
                
                       User::where('id',$reffer->id)->update(['bonus_points' => $bst_bonus]);
                
                      }else{
                        $bst_bonus =  $reffer->right_points * 2;
                
                        $bst_bonus = ($bst_bonus) * 0.02 ;
                
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
                
                          $bst_bonus = ($bst_bonus) * 0.02 ;
                
                          $bst_bonus = $right_reffer->bonus_points + $bst_bonus;
                
                          User::where('id',$right_reffer->id)->update(['bonus_points' => $bst_bonus]);
                 
                        }else{
                 
                          $bst_bonus =  $right_reffer->right_points * 2;
                 
                          $bst_bonus = ($bst_bonus) * 0.02 ;
                 
                          $bst_bonus = $right_reffer->bonus_points + $bst_bonus;
                 
                          User::where('id',$right_reffer->id)->update(['bonus_points' => $bst_bonus]);
                 
                            }
                    }

               }
            
             /*++++++++++++++++++++++++++++++++++++++    Rank Calculation Start   +++++++++++++++++++++++++++++++++++++++*/                      
                              //***RANK CALCULTION START HERE */
            
                          if($reffer->total_points == $right_reffer->total_points){
                            //**FOR BRONZ RANK (2000-4449) */
                            if($right_reffer->total_points >= 2000 && $right_reffer->total_points < 4500 && $right_reffer->rank !='Bronze'){

                                $rank_bonus = $depositer_parent->bonus_points + 100 ;

                                User::where('id',$depositer_parent->id)->update(['rank' => 'Bronze','bonus_points' => $rank_bonus]);

                            }elseif($right_reffer->total_points >= 4500 && $right_reffer->total_points < 10000 && $right_reffer->rank !='Gold'){
                            //**FOR GOLD (4500-9999) */   =>   FOR BIKE
                                User::where('id',$depositer_parent->id)->update(['rank' => 'Gold']);
                            }elseif($right_reffer->total_points >= 10000 && $right_reffer->total_points < 20000 && $right_reffer->rank !='Platinum'){
                                //**FOR Platinum (10000-19999) */  =>   FOR Mobile
                                    User::where('id',$depositer_parent->id)->update(['rank' => 'Platinum']);
                            }elseif($right_reffer->total_points >= 20000 && $right_reffer->total_points < 40000 && $right_reffer->rank !='Team Manager'){
                                //**FOR Platinum (20000-39999) */  =>   FOR Team Manager
                                    $rank_bonus = $depositer_parent->bonus_points + 1200;
                                     User::where('id',$depositer_parent->id)->update(['rank' => 'Team Manager','bonus_points' => $rank_bonus]);
                            }elseif($right_reffer->total_points == 70000 && $right_reffer->rank !='Senior Manager'){
                                //**FOR Platinum (70000) */  =>   Senior Manager
                                $rank_bonus = $depositer_parent->bonus_points + 2500;
                                User::where('id',$depositer_parent->id)->update(['rank' => 'Senior Manager','bonus_points' => $rank_bonus]);
                            }elseif($right_reffer->total_points == 120000 && $right_reffer->rank !='Director'){
                                //**FOR Director (120000) */  =>   Director
                              // $rank_bonus = $depositer_parent->bonus_points + 2500;
                                User::where('id',$depositer_parent->id)->update(['rank' => 'Director']);
                            }elseif($right_reffer->total_points == 200000 && $right_reffer->rank !='Marketing Director'){
                                //**FOR Marketing Director (200000) */  =>   Director
                                $rank_bonus = $depositer_parent->bonus_points + 7000;
                                User::where('id',$depositer_parent->id)->update(['rank' => 'Marketing Director','bonus_points' => $rank_bonus]);
                            }elseif($right_reffer->total_points == 400000 && $right_reffer->rank !='Emerald'){
                                //**FOR Emerald (400000) */  =>   Emerald//
                                User::where('id',$depositer_parent->id)->update(['rank' => 'Emerald']);
                            }elseif($right_reffer->total_points == 800000 && $right_reffer->rank !='Dimaond'){
                                //**FOR Emerald (800000) */  =>   Emerald
                                $rank_bonus = $depositer_parent->bonus_points + 25000;
                                User::where('id',$depositer_parent->id)->update(['rank' => 'Dimaond','bonus_points' => $rank_bonus]);
                            }elseif($right_reffer->total_points == 1500000 && $right_reffer->rank !='Blue Dimaond'){
                                //**FOR Blue Dimaond (1500000) */  =>   Blue Dimaond
                                $rank_bonus = $depositer_parent->bonus_points + 35000;
                                User::where('id',$depositer_parent->id)->update(['rank' => 'Blue Dimaond','bonus_points' => $rank_bonus]);
                            }elseif($right_reffer->total_points == 2500000 && $right_reffer->rank !='Royal Dimaond'){
                                //**FOR Royal Dimaond (2500000) */  =>   Royal Dimaond
                                $rank_bonus = $depositer_parent->bonus_points + 15000;
                                User::where('id',$depositer_parent->id)->update(['rank' => 'Royal Dimaond','bonus_points' => $rank_bonus]);
                            }elseif($right_reffer->total_points == 5000000 && $right_reffer->rank !='Crown Dimaond'){
                                //**FOR Crown Dimaond (2500000) */  =>   Crown Dimaond
                                $rank_bonus = $depositer_parent->bonus_points + 100000;
                                User::where('id',$depositer_parent->id)->update(['rank' => 'Crown Dimaond','bonus_points' => $rank_bonus]);
                            }elseif($right_reffer->total_points == 10000000 && $right_reffer->rank !='Presidental Dimaond'){
                                //**FOR Presidental Dimaond (2500000) */  =>   Presidental Dimaond
                                // $rank_bonus = $depositer_parent->bonus_points + 10000000;
                                User::where('id',$depositer_parent->id)->update(['rank' => 'Presidental Dimaond']);
                            }elseif($right_reffer->total_points == 15000000 && $right_reffer->rank !='Int Presidental Dimaond'){
                                //**FOR Presidental Dimaond (2500000) */  =>  Int Presidental Dimaond
                                $rank_bonus = $depositer_parent->bonus_points + 10000000;
                                User::where('id',$depositer_parent->id)->update(['rank' => 'Int Presidental Dimaond','bonus_points' => $rank_bonus]);
                            }
                        }
                        
/*++++++++++++++++++++++++++++++++++++++    Rank Calculation Start   +++++++++++++++++++++++++++++++++++++++*/                          
            
             $bst_flag = 1;
             break;
            } 
            else{
                $bst_flag = 1;
                 break;
            }
/*+++++++++++++++++++++++++++++++++    Binary Bonus to Ancestors Start   +++++++++++++++++++++++++++++++++++*/
            
            
        }
    }
echo $ctype->status;
}
    //TODO: DELETE DEPOSITS
    public function delete(Request $request)
    {
        Deposit::where('id', $request->id)->delete();
    }
}
