<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Client;
use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
public function home()
{
    $services = Service::all();
    $faqs = Faq::all();
    $portfolios = Portfolio::all();
    $clients = Client::all();

    return view(
        'frontend.index',
        compact('services', 'faqs', 'portfolios','clients')
    );
}
public function faq()
{
    $faqs = Faq::all();

    return view('frontend.faq', compact('faqs'));
}
public function client()
{
    $clients = Client::all();

    return view('frontend.client', compact('clients'));
}

public function about()
{
    return view('frontend.about');
}

public function service()
{
    $services = Service::all();

    return view('frontend.service', compact('services'));
}
public function portfolio()
{
    $portfolios = Portfolio::paginate('4');

    return view('frontend.portfolio', compact('portfolios'));
}

public function contact()
{
    return view('frontend.contact');
}
}