<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function store(Request $request)
    {
        // Validate that items is an array of { name, quantity, price }
        $data = $request->validate([
            'items'            => 'required|array|min:1',
            'items.*.name'     => 'required|string',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price'    => 'required|numeric|min:0',
        ]);

        // Create the cart (add extra fields if your carts table requires them)
        $cart = Cart::create([
            // 'user_id' => auth()->id(), // e.g. if you track users
        ]);

        // Create each cart item, now including price
        foreach ($data['items'] as $item) {
            $cart->items()->create([
                'product_name' => $item['name'],
                'quantity'     => $item['quantity'],
                'price'        => $item['price'],
            ]);
        }

        return response()->json([
            'success' => true,
            'cart_id' => $cart->id,
        ]);
    }
}
