<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MyNetwork extends Controller
{
    public function index()
    {
        if (!isset(Auth::user()->id)) {
            return view('admin.auth.login');
        } else {
            return view('admin.mynetwork.index');
        }
    }
}
