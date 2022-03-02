<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //for loading admin profile view
    public function index()
    {
        return view('admin.profile.index');
    }
}
