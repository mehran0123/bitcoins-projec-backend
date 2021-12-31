<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Percentage;
use Illuminate\Support\Facades\Auth;

class PercentageController extends Controller
{
    //loading Percentage Percentage view
    public function index(){
        $percentage = Percentage::take(1)->first();
         return view('admin.percentage.index', compact('percentage'));
     }
     //Product Percentage Create View//
     public function createView()
     {
         return view('admin.percentage.create');
     }
      //create Percentage
      public function create_process(Request $request)
      {
          $checkposts = Percentage::take(1)->first();
          if($checkposts){
              return 'duplicate';
          }
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
          $checkPercentage = Percentage::all();

          foreach ($checkPercentage as $Percentage) {

              if ($request->Percentage_name  == $Percentage->name) {
                  if ($request->id != $Percentage->id) {
                      echo 'duplicate';
                      return;
                  }
              }
          }
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
}
