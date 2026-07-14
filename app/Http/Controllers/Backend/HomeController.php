<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\PageContent;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
       $pageContents = PageContent::count();
    $services = Service::count();
    // $testimonials = Testimonial::count();
    $contacts = Contact::count();
    $unreadContacts = Contact::where('is_read', false)->count();

    $recentContacts = Contact::latest()->take(5)->get();

    return view('dashboard.index', compact(
        'pageContents',
        'services',
        'testimonials',
        'contacts',
        'unreadContacts',
        'recentContacts'
    ));
    }
}
