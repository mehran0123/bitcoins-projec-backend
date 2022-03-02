<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Withdraw;
use Illuminate\Support\Carbon;
class DashboardController extends Controller
{
    //loading dashboard page here
    public function index()
    {
        $users=User::where('user_role',2)->count();
        $user = DB::table('users')->first();
        $slider = DB::table('sliders')->where('status','1')->get();
        $all_deposits = Deposit::where('user_id',Auth::user()->id)->where('status','1')->get(['amount'])->sum('amount');
        //$all_withdraws = Withdraw::pluck('amount')->toArray();
        //$deposits = array_sum($all_deposits);
        //$withdraws = array_sum($all_withdraws);
        //return $withdraws;
        //return $all_deposits;
        //return $slider;
        $deposits = $all_deposits;
        $cuser=User::where('id',Auth::user()->id)->get();
        //$leftchilds = $this->calculateLSum($cuser);
        return view('admin.dashboard.index',compact('users','deposits','slider'));
    }
}


