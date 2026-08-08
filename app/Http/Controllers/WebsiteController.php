<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Client;
use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Contact;
use Illuminate\Support\Facades\Http;

class WebsiteController extends Controller
{

public function home()
{
    $services = Service::all();
    $faqs = Faq::all();
    $portfolios = Portfolio::all();
    $clients = Client::all();
    $setting = Setting::first();

    return view(
        'frontend.index',
        compact('services', 'faqs', 'portfolios','clients','setting')
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
    $services = Service::all();

    return view('frontend.contact', compact('services'));
}
public function setting()
{
    $settings = Setting::all();

    return view('frontend.setting', compact('settings'));
}
public function storeContact(Request $request)
{
    $data = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'message' => 'required',
        'g-recaptcha-response' => 'required',
    ],
            [
                'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            ]);

    $response = Http::asForm()->post(
        'https://www.google.com/recaptcha/api/siteverify',
        [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $request->input('g-recaptcha-response'),
        ]
    );

    $result = $response->json();

    if (!($result['success'] ?? false)) {
        return back()
            ->withErrors([
                'captcha' => 'Please verify that you are not a robot.'
            ])
            ->withInput();
    }

    Contact::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'message' => $data['message'],
        'is_read' => false,
    ]);

    return back()->with(
        'success',
        'Message sent successfully.'
    );
}
}