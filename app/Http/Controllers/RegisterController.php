<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
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
        Log::info('Raw input:', $request->all());

        // Step 2: Validate with:
        //  - min 10 chars
        //  - at least one uppercase letter
        //  - at least one symbol
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:userinfo,name',
            'email'    => 'required|email|max:255|unique:userinfo,email',
            'country'  => 'required|string|max:255',
            'password' => [
                'required',
                'string',
                'confirmed',
                'min:10',
                'regex:/[A-Z]/',                       // must contain uppercase
                'regex:/[!@#$%^&*(),.?":{}|<>]/',      // must contain a symbol
            ],
        ], [
            'password.min'   => 'Password must be at least 10 characters long.',
            'password.regex' => 'Password must include at least one uppercase letter and one symbol.',
        ]);

        // Step 3: Fail validation → back with errors & show signup form
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('form', 'register');
        }

        // Step 4: Grab the validated data
        $data = $validator->validated();
        Log::info('Validated input:', $data);

        // Step 5: Create the user (hashing the password)
        $user = UserInfo::create([
            'name'     => $data['username'],
            'email'    => $data['email'],
            'address'  => $data['country'],
            'password' => Hash::make($data['password']),
        ]);

        Log::info('User created ID:', [$user->id]);

        // Step 6: Redirect to login with a success status
        return redirect()
            ->route('login')
            ->with('status', 'Account created! Please log in.');
    }
}
