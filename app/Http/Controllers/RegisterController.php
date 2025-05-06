<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Monarobase\CountryList\CountryListFacade as Countries;

class RegisterController extends Controller
{
    /**
     * Show the signup form with a list of countries.
     */
    public function index()
    {
        $countries = Countries::getList('en', 'php');
        return view('widgets.auth-widget', compact('countries'));
    }

    /**
     * Handle the submission of the signup form.
     */
    public function store(Request $request)
    {
        // Step 1: Log the raw input
        \Log::info('Raw input:', $request->all());
    
        // Step 2: Validate input
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'email'    => 'required|email|unique:userinfo,email',
            'country'  => 'required|string|max:255',
            'password' => 'required|confirmed|min:8',
        ]);
    
        // Step 3: Log validated data
        \Log::info('Validated input:', $data);
    
        // Step 4: Try insert
        $user = UserInfo::create([
            'name'     => $data['username'],
            'email'    => $data['email'],
            'address'  => $data['country'],
            'password' => \Hash::make($data['password']),
        ]);
    
        \Log::info('User created ID:', [$user->id ?? 'not set']);
    
        return redirect()
            ->route('login')
            ->with('status', 'Account created! Please log in.');
    }
    
}
