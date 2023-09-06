<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        (new ContactRequest())->create([
            'name' => $request->get('name'),
            'mobile' => $request->get('mobile'),
            'email' => $request->get('email'),
            'message' => $request->get('message'),
        ]);

        return redirect()
            ->route('contact.show')
            ->with('success', 'Your message has been sent successfully.');
    }
}
