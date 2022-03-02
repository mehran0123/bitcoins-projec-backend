<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Mail\ForgetPasswordEmail;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
class AuthController extends Controller
{
    public function sendMail(Request $request){
      try
        {
         //TODO: Validating the rquest params for better security
        if(!isset($request->email)) return response()->json(['status' => 400, 'message' => 'The email field is required.']);

        // TODO: Check if email is exits in Portals which having user_role 1
        $CheckEmail = User::where('email',$request->email)->where('user_role', '!=', 2)->first();
        // TODO: If record not found return false
        // $password= 'f'.rand(1000,999999).'c';
        if(is_null($CheckEmail))
        {
               return response()->json(['status' => 400, 'message' => 'Email not exist.']);
        }
        else
        {
            $password= $CheckEmail->real_password;
            $CheckEmail->password=$password;
            $CheckEmail->real_password=$password;
            $CheckEmail->update();
        }
        $details=[
            'title' =>'Forget Password',
            'body'  =>'This Email from Code-Fc To Reset Password',
            'password' =>$password
        ];
        Mail::to($request->email)->send( new ResetPasswordMail($details));
        return response()->json(['status' => 200, 'message' => 'An email is just sent to your mail account please check to reset password']);
     }catch(\Exception $ex)
     {
        return response()->json(['status' => 500, 'message' => 'Internal Server Error', 'response' => $ex->getMessage()]);
     }
   }
    //TODO: User Login Api
      public function login(Request $request){
        try
        {
            //TODO: Applying Basic Validation
            if(!isset($request->email)) return response()->json(['status' => 400, 'message' => 'The email field is required.']);
            if(!isset($request->password)) return response()->json(['status' => 400, 'message' => 'The password field is required.']);
            if(!isset($request->fcm_token)) return response()->json(['status' => 400, 'message' => 'FCM Token is required.']);

            $check = User::where('email',$request->email)->first();
            $data=[];
            if(!is_null($check)) {
                $data = ['email' => $request->email, 'password' => $request->password];
            } else {
                $data = [];
            }
        if(Auth::attempt($data)) {
            $user = Auth::user();
            //TODO: CHEKCING IF USER IS ACTIVE OR NOT
            if($user->is_active == 1) {
                $data = ['email' => $request->email, 'password' => $request->password];
            } else {
                $data = [];
            }
            if(Auth::attempt($data)) {
                    User::where('email',$request->email)->update(['fcm_id' => $request->fcm_token]);
                    $user->token_name = 'Bearer';
                    $user->token = $user->createToken('authToken')->accessToken;
                    return response()->json(['status' => 200, 'message' => 'User Login Successfully!', 'response' => $user]);
            } else {
                    return response()->json(['status' => 400, 'message' => 'Your account is inactive. Please contect with support!']);
                }

         }else{
                return response()->json(['status' => 400, 'message' => 'Invalid Email or Password']);
            }
        }catch(\Exception $ex)
        {
            return response()->json(['status' => 500, 'message' => 'Internal Server Error', 'response' => $ex->getMessage()]);
        }

    }
    // TODO: Forgot Password Process
    public function forgot_password(Request $request)
    {
        try
        {
            // TODO: Validating the rquest params for better security
        if(!isset($request->email)) return response()->json(['status' => 400, 'message' => 'The email field is required.']);

        // TODO: Check if email is exits in Portals which having user_role 1
        $CheckEmail = User::where(['email' => $request->email])->where('user_role', 2)->first();
        // TODO: If record not found return false
        if(is_null($CheckEmail)) return response()->json(['status' => 400, 'message' => 'Email not exist.']);

        //TODO:  Getting User and updating it
        $user = User::find($CheckEmail->id);

        $details=['password' => $user->real_password,'name'=>$user->name];
        //TODO: Sending Email Here
       // Mail::to($request->email)->send(new ForgetPasswordEmail($details));

        $to = $request->email;
        $from = 'helloamazing@account.com';
        $fromName = 'Bitcoins';

        $subject = "Forget Password";

        $message = "Hii ".$user->name." Your Password is:\n <b>".$user->real_password."</b>";

        // Additional headers
        $headers = 'From: '.$fromName.'<'.$from.'>';

        // Send email
        if(mail($to, $subject, $message, $headers)){
            return response()->json(['status' => 200, 'message' => 'An email is just sent to your mail account please check your inbox or spam']);
        }else{
            return response()->json(['status' => 400, 'message' => 'Email Not sent,somthing went wrong']);
        }
        }catch(\Exception $ex)
        {
            return response()->json(['status' => 500, 'message' => 'Internal Server Error', 'response' => $ex->getMessage()]);
        }
    }
     // TODO: Change Password Process
     public function change_password(Request $request)
     {
         try
         {
            // TODO: Validating the rquest params for better security
             if(!isset($request->new_password)) return response()->json(['status' => 400, 'message' => 'The new password field is required.']);
             // TODO: Check if email is exits in Portals which having user_role 1
            $CheckEmail = User::where('id',Auth::user()->id)->first();
             User::where('id',Auth::user()->id)->update(['password' => Hash::make($request->new_password),'real_password'=>$request->new_password]);
            return response()->json(['status' => 200, 'message' => 'Password Updated Successfully!']);
         }catch(\Exception $ex)
         {
             return response()->json(['status' => 500, 'message' => 'Internal Server Error', 'response' => $ex->getMessage()]);
         }
     }
    //TODO: REGISTER USER //
    public function register(Request $request)
    {
        try{
             $checkTitle = User::where(['name' => $request->name])->first();
             $checkEmail = User::where(['email' => $request->email])->first();
             if($checkTitle){
                return response()->json(['status' => 409, 'message' => 'User Name ALready Exists.']);
             }
             if($checkEmail){
                return response()->json(['status' => 409, 'message' => 'User Email ALready Exists.']);
             }
             $user = new User;
             $user->name = $request->name;
             $user->email = $request->email;
             $user->password = $request->password;
             $user->real_password = $request->password;
             $user->phone = $request->phone;
             $user->fcm_id = $request->fcm_id;
             $user->save();
             $token = $user->createToken('authToken')->accessToken;
             $user->token =  $token;
             return response()->json(['status' => 200, 'message' => 'User Created Successfully!.','response'=>$user]);
        }catch(\Exception $ex){
            return response()->json(['status' => 500, 'message' => 'Internal Server Error', 'response' => $ex->getMessage()]);
        }
    }
     //TODO: UPDATE USER PROFILE //
     public function update_profile(Request $request)
     {
         try{
             $user=Auth::user();
              $checkEmail = User::where('email',$request->email)->where('id','!=',$user->id)->first();
              if($checkEmail){
                 return response()->json(['status' => 409, 'message' => 'User Email ALready Exists.']);
              }
              $user = User::find($user->id);
              $user->name = $request->name;
              $user->email = $request->email;
              $user->phone = $request->phone;
              $user->save();
              return response()->json(['status' => 200, 'message' => 'User Profile Updated Successfully!.','response'=>$user]);
         }catch(\Exception $ex){
             return response()->json(['status' => 500, 'message' => 'Internal Server Error', 'response' => $ex->getMessage()]);
         }
     }
    //TODO: Logout USER
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['status' => 200, 'message' => 'Logout successfully!']);
    }
    //SOCIAL LOGIN START HERE//
    //GOOGLE CALLBACK
    public function handleGoogleCallback(Request $request){
        $user = Socialite::driver('google')->userFromToken($request->token);
        $this->_registerOrLoginUser($user);
        //RETURN ON HOME PAGE AFTER LOGIN
       return response()->json(['status' => 200, 'message' => 'User Logged In successfully!']);
    }
    //facebook CALLBACK
    public function handleFacebookCallback(Request $request){
       // return $request->all();
        $user = Socialite::driver('facebook')->userFromToken($request->token);
        return $user->name;
        $this->_registerOrLoginUser($user);
       return response()->json(['status' => 200, 'message' => 'User Logged In successfully!']);

    }
    //CHECKING USERS AND (LOGIN/Rsgister)//
    protected function _registerOrLoginUser($data){
        $user = User::where('email','=',$data->email)->first();
        if(!$user){
            $user= new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provided_id = $data->id;
            $user->avatar = $data->avatar;
            $user->token = $data->token;
            $user->save();
        }
        Auth::login($user);
    }
    //GETING PROFILE START HERE//
    public function get_profile()
    {
        try{
            $user=User::with('photos')->where('id',Auth::user()->id)->first();
            return response()->json(['status'=>200,'message'=>'User Profile','response'=>$user]);
        }catch(\Exception $ex){
            return response()->json(['status' => 500, 'message' => 'Internal Server Error', 'response' => $ex->getMessage()]);
        }
    }
}
