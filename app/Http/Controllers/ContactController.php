<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;


class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Send an email to the admin
        Mail::to('chankaherath2001@gmail.com')->send(new ContactFormSubmitted(
            $validatedData['name'],
            $validatedData['email'],
            $validatedData['message']
        ));

        // Send a default email to the user (you can customize this part)
        Mail::to($validatedData['email'])->send(new ContactFormSubmitted(
            $validatedData['name'],
            $validatedData['email'],
            $validatedData['message']
        ));

        // You can also flash a message to the user, redirect, etc.
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
