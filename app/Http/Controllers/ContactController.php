<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
          'firstName' => 'required|string|max:50',
          'lastName'  => 'required|string|max:50',
          'email'     => 'required|email|max:100',
          'phone'     => 'required|string|max:20',
          'message'   => 'required|string',
        ]);

        // Map form field names to your columns
        Contact::create([
          'first_name' => $data['firstName'],
          'last_name'  => $data['lastName'],
          'email'      => $data['email'],
          'phone'      => $data['phone'],
          'message'    => $data['message'],
        ]);

        return back()->with('success', 'Your message has been sent!');
    }
}

