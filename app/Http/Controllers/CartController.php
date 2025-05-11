<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function store(Request $request)
    {
        // validate that items is an array of {name,quantity}
        $data = $request->validate([
          'items'           => 'required|array|min:1',
          'items.*.name'    => 'required|string',
          'items.*.quantity'=> 'required|integer|min:1',
        ]);

        // create the cart
        $cart = Cart::create();

        // create each cart item
        foreach ($data['items'] as $item) {
            $cart->items()->create([
              'product_name' => $item['name'],
              'quantity'     => $item['quantity'],
            ]);
        }

        return response()->json([
          'success' => true,
          'cart_id' => $cart->id,
        ]);
    }
}
