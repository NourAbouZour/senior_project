<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Monarobase\CountryList\CountryListFacade as Countries;

class LoginController extends Controller
{
    /**
     * Show the combined Login/Signup page.
     */
    public function index()
    {
        // Retrieve an associative array: ['AF' => 'Afghanistan', …]
        $countries = Countries::getList('en', 'php');

        // Pass countries into the view for the signup dropdown
        return view('pages.login', compact('countries'));
    }
}
