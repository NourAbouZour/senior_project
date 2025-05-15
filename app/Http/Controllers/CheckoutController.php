<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Monarobase\CountryList\CountryListFacade as Countries;

class CheckoutController extends Controller
{
    /**
     * Show the checkout form with cart_id and total.
     */
    public function create(Request $request)
    {
        $countries = Countries::getList('en', 'php');

        // grab cart_id and total from the query string
        $cartId = $request->query('cart_id');
        $total  = $request->query('total');

        return view('widgets.checkout-form', compact('countries', 'cartId', 'total'));
    }

    /**
     * Alias for create()
     */
    public function index(Request $request)
    {
        return $this->create($request);
    }

    /**
     * Handle the POSTed form, including saving cart_id and total.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'cart_id'        => 'required|exists:carts,id',
            'total'          => 'required|numeric',
            'email'          => 'required|email',
            'phone'          => 'required',
            'fullname'       => 'required|string',
            'address1'       => 'required|string',
            'address2'       => 'nullable|string',
            'city'           => 'required|string',
            'state'          => 'required|string',
            'country'        => 'required|string',
            'payment_method' => 'required|string',
            'cc_name'        => 'nullable|required_if:payment_method,credit-card|string',
            'cc_number'      => 'nullable|required_if:payment_method,credit-card|digits_between:12,19',
            'cc_expiration'  => 'nullable|required_if:payment_method,credit-card|regex:/^\d{2}\/\d{2}$/',
            'cc_cvc'         => 'nullable|required_if:payment_method,credit-card|digits:3',
            'terms'          => 'accepted',
        ]);

        // Create the order, including cart_id and total
        $order = Order::create($data);

        return redirect()
               ->route('checkout.create', [
                   'cart_id' => $data['cart_id'],
                   'total'   => $data['total'],
               ])
               ->with('success', 'Your order has been placed! Total: $' . number_format($data['total'], 2));
    }
}
