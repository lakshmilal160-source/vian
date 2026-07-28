<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
{
    return view('frontend.index');
}

public function about()
{
    return view('frontend.about');
}

public function service()
{
    return view('frontend.service');
}

public function portfolio()
{
    return view('frontend.portfolio');
}

public function contact()
{
    return view('frontend.contact');
}
}