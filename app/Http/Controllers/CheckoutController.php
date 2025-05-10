<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Monarobase\CountryList\CountryListFacade as Countries;

class CheckoutController extends Controller
{
    public function index()
    {
        // get ['US'=>'United States', …]
        $countries = Countries::getList('en','php');
        return view('widgets.checkout-form', compact('countries'));  
    }

    // app/Http/Controllers/CheckoutController.php

public function store(Request $request)
{
    $data = $request->validate([
        'email'          => 'required|email',
        'phone'          => 'required',
        'fullname'       => 'required|string',
        'address1'       => 'required|string',
        'address2'       => 'nullable|string',
        'city'           => 'required|string',
        'state'          => 'required|string',
        'country'        => 'required|string',
        'payment_method' => 'required|string',

        // Allow these to be null unless payment_method is credit-card
        'cc_name'       => 'nullable|required_if:payment_method,credit-card|string',
        'cc_number'     => 'nullable|required_if:payment_method,credit-card|digits_between:12,19',
        'cc_expiration' => 'nullable|required_if:payment_method,credit-card|regex:/^\d{2}\/\d{2}$/',
        'cc_cvc'        => 'nullable|required_if:payment_method,credit-card|digits:3',

        'terms'          => 'accepted', 
    ]);

    Order::create($data);

    return redirect()
           ->route('checkout.index')
           ->with('success','Your order has been placed!');
}
}

