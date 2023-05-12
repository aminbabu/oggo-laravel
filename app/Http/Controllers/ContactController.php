<?php

namespace App\Http\Controllers;

use App\Mail\ReceiverMail;
use App\Mail\SenderMail;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Contact;
use TCG\Voyager\Models\MenuItem;

class ContactController extends Controller
{
    /*
    | show contact page
    |
    */
    public function index(): View
    {
        $page_ref = MenuItem::where('title', 'Contact')->first();

        $contacts = Feature::where('page_ref_id', $page_ref->id)->get();

        return view('frontend.pages.contact', ['contacts' => $contacts]);
    }

    /*
    | send contact mail
    |
    */
    public function store(Request $request): View|RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email:rfc,dns'],
            'subject' => ['required'],
            'message' => ['required', 'max:65556']
        ]);

        // store subscriber contact
        Contact::create($validatedData);

        // send the receiver email
        // Mail::send(new ReceiverMail($validatedData));

        // send the sender email
        Mail::send(new SenderMail($validatedData));

        // redirect back to the contact form with a success message
        return redirect()->back()->with('success', 'Thank you for your message! We will contact you shortly.');
    }
}