<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
class DashboardController extends Controller
{
    //loading dashboard page here
    public function index()
    {
         $users=User::where('user_role',2)->count();

        return view('admin.dashboard.index',compact('users'));
    }
}
