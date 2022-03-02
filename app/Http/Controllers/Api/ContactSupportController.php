<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactSupport;
use App\Models\PrivacyPolicy;

class ContactSupportController extends Controller
{

     //GETING Contact Support START HERE//
     public function contact_support(Request $request)
     {
         try{
             if(!isset($request->name)){
               return response()->json(['status'=>200,'message'=>'Name required','response'=>'']);
             }
             if(!isset($request->email)){
                return response()->json(['status'=>200,'message'=>'Email required','response'=>[]]);
              }
              if(!isset($request->message)){
                return response()->json(['status'=>200,'message'=>'Message required','response'=>[]]);
              }
             $contact= new ContactSupport;
             $contact->name = $request->name;
             $contact->email = $request->email;
             $contact->message = $request->message;
             $contact->save();
             return response()->json(['status'=>200,'message'=>'Message Sent To Support Team','response'=>$contact]);

         }catch(\Exception $ex){
             return response()->json(['status' => 500, 'message' => 'Internal Server Error', 'response' => $ex->getMessage()]);
         }
     }

     //GETING Contact Support START HERE//
     public function privacy_policy()
     {
         try{
               $privacy_policy=PrivacyPolicy::get();
               return response()->json(['status'=>200,'message'=>'Privacy Policy','response'=>$privacy_policy[0]]);

         }catch(\Exception $ex){
             return response()->json(['status' => 500, 'message' => 'Internal Server Error', 'response' => $ex->getMessage()]);
         }
     }
}
