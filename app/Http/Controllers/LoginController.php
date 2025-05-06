<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Monarobase\CountryList\CountryListFacade as Countries;

class LoginController extends Controller
{
    /**
     * Show the combined Login/Signup page.
     */
    public function index()
    {
        $countries = Countries::getList('en', 'php');
        return view('pages.login', compact('countries'));
    }

    /**
     * Handle the login form submission.
     */
    public function login(Request $request)
    {
        // 1. Validate incoming data
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // 2. Fetch user by the 'name' column
        $username = trim($credentials['username']);
        $user = UserInfo::where('name', $username)->first();

        // 3. Fail if user not found
        if (! $user) {
            return back()
                ->withInput($request->only('username'))
                ->withErrors(['credentials' => 'User not found.'])
                ->with('form', 'login');
        }

        // 4. Check the hashed password
        if (! Hash::check($credentials['password'], $user->password)) {
            return back()
                ->withInput($request->only('username'))
                ->withErrors(['credentials' => 'Invalid password.'])
                ->with('form', 'login');
        }

        // 5. Log them in
        Session::put('user_id',   $user->id);
        Session::put('username',  $user->name);

        // 6. Redirect to your protected area
        return redirect()->route('functions');
    }
}
