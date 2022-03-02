<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session ;

class ReferFriendsController extends Controller
{
    public function index()
    {
        if (!isset(Auth::user()->id)) {
            return view('admin.auth.login');
        } else {
            return view('admin.referfriend.index');
        }
    }
}
