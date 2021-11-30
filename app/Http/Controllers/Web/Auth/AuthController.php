<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SignUpMail;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Session;
use Hash;

class AuthController extends Controller
{
    //for loading login page
    public function index(Request $request, $token = null){
         if(isset($token)){
            $user = User::where('remember_token',$token)->first();

            if(!is_null($user)){
                Session::flash('message',trans("translation.account_verified"));
            User::where('id',$user->id)->update(['remember_token' => '', 'status' => 1]);

            }else{
                    Session::flash('error',trans("translation.account_verified_already"));
                     return redirect('/login');

            }

        }
        if(!$request->session()->has('user')){
        return view('web.auth.login');
        }else{
            return redirect()->route('web.user.index');
        }
    }

    //for login
    public function login(Request $request){
        $email = User::where('email',$request->email)->first();

        if(is_null($email)){
            $request->session()->flash('error', trans('translation.invalid_credentials'));
            return redirect()->back();
        }

        $check = Hash::check($request->password, $email->password);

        if ($check == false) {
            $request->session()->flash('error', trans('translation.invalid_credentials'));
            return redirect()->back();
        }

        if($email->user_role != 2){
            $request->session()->flash('error', trans('translation.invalid_credentials'));
            return redirect()->back();
        }

        if($email->is_active == 0){
            $request->session()->flash('error', trans('translation.account_blocked'));
            return redirect()->back();
        }

        if($email->status == 0){
            $request->session()->flash('error', trans('translation.account_not_verified'));
            return redirect()->back();
        }

        $request->session()->put('user',$email);
        return redirect()->route('web.user.index');

    }

    //for loading signup page
    public function register(){
        return view('web.auth.register');
    }

    //checking email is exists or not
    public function signup_process(Request $request){

        //checking signup email is unique or not
        $checkEmail = User::where('email',$request->email)->get();

        if(count($checkEmail) > 0){
            return 'false';
        }

        //creating new user here
        $user = new User;
        $user->name = $request->full_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->status = 0;
        $user->is_active = 1;
        $user->save();
        $user_id = $user->id;


            //creating token here
            $token = $user_id . md5(now());
            $details = [
                'username' => $request->full_name,
                'token' => $token
            ];

            User::where('id', $user_id)->update(['remember_token' => $token]);
            //sending email here
            \Mail::to($request->email)->send(new SignUpMail($details));

            echo "success";
        }

        //for loading forgot password view
        public function forgot_password(){
            return view('web.auth.forgot-password');
        }

        //forgot password process
        public function forgot_password_process(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!is_null($user)) {
            $token = $user->id . md5(now());
            $details = [
                'username' => $user->name,
                'token' => $token
            ];

            User::where('id', $user->id)->update(['remember_token' => $token]);

            \Mail::to($request->email)->send(new ForgotPasswordMail($details));

            return "success";
        }
        return "false";
    }

        //for reset password
        public function reset_password($token){
            $checkToken = User::where('remember_token', $token)->first();



        if (!is_null($checkToken)) {
            $token = $checkToken->id;
            return view('web.auth.reset-password', ['token' => $token]);
        } else {
            Session::flash('error',trans('translation.link_expire'));
            return redirect('/login');
        }
        }

         //for reset password process
    public function reset_password_process(Request $request)
    {

        if ($request->token != "") {
            $user = User::find($request->token);
            $user->password = $request->password;
            $user->remember_token = '';
            $user->save();
            return 'true';
        } else {
            return 'false';
        }
    }

    //for logout
    public function logout(Request $request){
        $request->session()->pull('user');
        return redirect('/login');
    }

}
