<?php

namespace App\Http\Controllers;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //後台==========================

    public function renderDashboard(Request $request)
    {
        return view('dashboard');
    }

    //前台==========================

    public function renderShop(Request $request)
    {
        $lang = LaravelLocalization::getCurrentLocale();
        dd($lang);
        return view('shop');
    }

    public function renderHome(Request $request)
    {
        $lang = LaravelLocalization::getCurrentLocale();
    }


}
