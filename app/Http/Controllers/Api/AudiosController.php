<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\AudioDetail;
use App\Models\Audio;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AudiosController extends Controller
{
     //GETING PROFILE START HERE//
     public function get_audios()
     {
         try{
             $categories=Category::with(['category_audios'=>function($qry){
                return $qry->with('image')->with('audios');
                }])
               ->with(['sub_category'=> function($query){
                 return $query->with('image')->with(['category_audios'=>function($q){
                     return $q->with('image')->with('course_audios');
                 }]);
             }])->where(['parent_id'=>0,'status'=>1])->get();
             return response()->json(['status'=>200,'message'=>'Categories Audios','response'=>$categories]);
         }catch(\Exception $ex){
             return response()->json(['status' => 500, 'message' => 'Internal Server Error', 'response' => $ex->getMessage()]);
         }
     }
}
