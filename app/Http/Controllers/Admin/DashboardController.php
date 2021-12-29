<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Support\Carbon;
class DashboardController extends Controller
{
    //loading dashboard page here
    public function index()
    {
         $users=User::where('user_role',2)->count();
        //All Deposit
        //All Withdraws
        $all_deposits = Deposit::pluck('amount')->toArray();
     //   $all_withdraws = Withdraw::pluck('amount')->toArray();
        $deposits = array_sum($all_deposits);
      //  $withdraws = array_sum($all_withdraws);
        //return $withdraws;
        return view('admin.dashboard.index',compact('users','deposits'));
    }
}
