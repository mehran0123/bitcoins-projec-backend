<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Percentage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PercentageController extends Controller
{
    //loading Percentage Percentage view
    public function index(){
        $percentages = Percentage::get();
         return view('admin.percentage.index', compact('percentages'));
     }
     //Product Percentage Create View//
     public function createView()
     {
         return view('admin.percentage.create');
     }
      //create Percentage
      public function create_process(Request $request)
      {
        //   $checkposts = Percentage::take(1)->first();
        //   if($checkposts){
        //       return 'duplicate';
        //   }
          //creating Percentage here
          $Percentage = new Percentage;
          $Percentage->amount = $request->percentage;
          $Percentage->save();
          echo 'success';
      }
      //Load Edit View of Percentage //
      public function edit($id)
      {
          $percentage = Percentage::where('id',$id)->first();
          return view('admin.percentage.edit', compact('percentage'));
      }

      //update Percentage
      public function update(Request $request)
      {
          //check Percentage name here
        //   $checkPercentage = Percentage::all();

        //   foreach ($checkPercentage as $Percentage) {

        //       if ($request->Percentage_name  == $Percentage->name) {
        //           if ($request->id != $Percentage->id) {
        //               echo 'duplicate';
        //               return;
        //           }
        //       }
        //   }
          //updateing Percentage here
          $Percentage = Percentage::find($request->id);
          $Percentage->amount = $request->percentage;
          $Percentage->save();
          echo 'success';
      }
        //Delete Percentage//
        // public function delete_Percentage(Request $request)
        // {
        //    Percentage::find($request->id)->delete();
        // }
        public function daily_bounes(){
            $percentages = Percentage::get(['current_date','created_at','amount']);
            $days=[];
            $day_percentages=[];
            $bonusdata=[];
            foreach($percentages as $percentage){
                //**GETTING CURRENT DATE ACCORDING PERCENTAGE */
                array_push($days,$percentage->current_date);
               //**GETTING ALL DEPOSIT ACCORDING TO DATE OF PERCHENTAGE */
                $total_deposit = Deposit::whereDate('created_at','<',$percentage->current_date)->get(['amount'])->sum('amount');
                $amount = ($total_deposit * $percentage->amount / 100) / 22;
                $amount = round($amount, 2);
                array_push($day_percentages,$amount);
            }
            for($i=0;$i < count($days);$i++){
                $bonusdata += [$days[$i] => $day_percentages[$i]];
            }
            //return $bonusdata;
             return view('admin.dailyBonus.index',compact('bonusdata'));
           }
    }
