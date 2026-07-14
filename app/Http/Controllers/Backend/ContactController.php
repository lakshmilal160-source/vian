<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
      public function index()
    {
        $contacts = Contact::latest()->paginate(10);

        return view('dashboard.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        // auto mark as read
        if (!$contact->is_read) {
            $contact->update([
                'is_read' => true
            ]);
        }

        return view('dashboard.contacts.show', compact('contact'));
    }

    public function toggleStatus(Contact $contact)
    {
        $contact->update([
            'is_read' => !$contact->is_read
        ]);

        return back()->with('success', 'Status updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return back()->with('success', 'Message deleted successfully.');
    }
}
