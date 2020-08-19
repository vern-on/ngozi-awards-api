<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Mail\ContactReceivedMessage;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $contact = Contact::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'message' => $request['message'],
        ]);

        Mail::to('hello@ngoziawards.org')->queue(new ContactReceivedMessage($contact));

        return response()->json();
    }
}
