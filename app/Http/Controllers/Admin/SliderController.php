<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Slider;

class SliderController extends Controller
{
    //loading Sliders
    public function index(){
        $sliders = Slider::orderBy('id','DESC')->get();
         return view('admin.sliders.index', compact('sliders'));
     }
     //Product Slider Create View//
     public function create()
     {
         return view('admin.sliders.create');
     }
      //create Slider
      public function create_process(Request $request)
      {
          //creating Slider here
          $slider = new Slider;
          $slider->image = $request->file('image')->store('SliderImages');
          $slider->save();
          //END HERE//
          echo 'success';
      }
      //Load Edit View of Slider //
      public function edit($id)
      {
          $slider = Slider::where('id',$id)->first();
          return view('admin.sliders.edit', compact('slider'));
      }
      //update Slider
      public function update(Request $request)
      {
          //updating Slider here
          $slider = Slider::find($request->id);
          $slider->image = $request->hasFile('image') ?  $request->file('image')->store('SliderImages') : $slider->image;
          $slider->save();
          echo 'success';
      }
      //Change Slider status//
      public function change_status(Request $request)
      {
          $slider = Slider::where('id', $request->id)->first();

          if ($slider->status == 1) {
            Slider::where('id', $request->id)->update(['status' => 0]);
          } else {
            Slider::where('id', $request->id)->update(['status' => 1]);
          }
          echo $slider->status;
      }
        //Delete Slider//
        public function delete(Request $request)
        {
            Slider::find($request->id)->delete();
        }

}
