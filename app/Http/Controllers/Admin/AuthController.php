<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use App\Http\Controllers\Admin\Mail;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //loading admin's login view here
    public function index()
    {
        if (!isset(Auth::user()->id)) {
            return view('admin.auth.login');
        } else {
            return redirect('/admin/dashboard');
        }
    }

    //login process for admin sie
    public function login_process(Request $request)
    {
        $data = ['email' => $request->email, 'password' => $request->password];

        //checking the login data here
        if (Auth::attempt($data)) {
            $user = Auth::user();

            //checking for admin login
            if ($user->user_role == 1) {
                return redirect('/admin/dashboard');
            } else {
                //redirecting to login page if user try to login
                Session::flash('error', trans('translation.invalid_email_or_password'));
                return redirect()->back();
            }
        } else {
            //redirecting to login if auth attempt failed
            Session::flash('error', trans('translation.invalid_email_or_password'));
            return redirect()->back();
        }
    }


    //for admin's forgot-password view
    public function forgot_password()
    {
        return view('admin.auth.forgot-password');
    }


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

            \Mail::to($request->email)->send(new ResetPasswordMail($details));

            Session::flash('message', trans('translation.recoverr_email_message'));
            return redirect()->back();
        }
        Session::flash('error', trans('translation.invalid_email'));
        return redirect()->back();
    }


    //for reset password
    public function reset_password($token)
    {
        $checkToken = User::where('remember_token', $token)->first();


        if (!is_null($checkToken)) {
            // User::where('id', $checkToken->id)->update(['remember_token' => '']);
            $token = $checkToken->id;
            return view('admin.auth.reset-password', ['token' => $token]);
        } else {
            return view('errors.419');
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

    //logout admin
    public function logout()
    {
        //destroying the Auth session here
        Session::flush();
        return redirect('/admin');
    }
}
