<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Monarobase\CountryList\CountryListFacade as Countries;

class RegisterController extends Controller
{
    /**
     * Show the signup form with a list of countries.
     */
    public function index()
    {
        // Retrieve an associative array of countries: ['AF' => 'Afghanistan', ...]
        $countries = Countries::getList('en','php');
    return view('widgets.auth-widget', compact('countries'));

    }

    /**
     * Handle the submission of the signup form.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'username'              => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'country'               => 'required|string|max:255',
            'password'              => 'required|confirmed|min:8',
        ]);

        // Create the new user
        User::create([
            'name'      => $data['username'],
            'email'     => $data['email'],
            'country'   => $data['country'],
            'password'  => Hash::make($data['password']),
        ]);

        // Redirect to login with a success message
        return redirect()
               ->route('login')
               ->with('status', 'Account created! Please log in.');
    }
}
