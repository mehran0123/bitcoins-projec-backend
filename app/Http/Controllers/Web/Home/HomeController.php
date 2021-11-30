<?php

namespace App\Http\Controllers\Web\Home;

use App\Http\Controllers\Controller;
use App\Models\Admin\Cms\OurService;
use App\Models\Admin\Cms\OurCenter;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //loading website home view
    public function index(){
        $ourservices = OurService::where('status',1)->get();
        $ourcenters = OurCenter::where('status',1)->get();
        return view('web.home.index', compact('ourservices','ourcenters'));
    }
}
