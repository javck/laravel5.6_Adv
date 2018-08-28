<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    //後台==========================
    
    public function renderDashboard(Request $request){
        return view('dashboard');
    }

    //前台==========================

    public function renderShop(Request $request){
        return view('shop');
    }
}
