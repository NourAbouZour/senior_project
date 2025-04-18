<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmartHouseController extends Controller
{
    /**
     * Display the smart house functions page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.functions'); 
    }
}
