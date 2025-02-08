<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = request()->user()->cartItems()->with('product')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function store(Product $product)
    {
        request()->user()->cartItems()->updateOrCreate(
            ['product_id' => $product->id],
            ['quantity' => DB::raw('quantity + 1')]
        );

        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function update(cart $cartItem, Request $request)
    {
        $cartItem->update(['quantity' => $request->quantity]);
        return redirect()->back()->with('success', 'Cart updated');
    }

    public function destroy(cart $cartItem)
    {
        $cartItem->delete();
        return redirect()->back()->with('success', 'Item removed from cart');
    }
    public function addToCart(Product $product)
    {
        $cart = session()->get('cart', []);
        $cart[$product->id] = $product;
        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Product added to cart');
    }
}
