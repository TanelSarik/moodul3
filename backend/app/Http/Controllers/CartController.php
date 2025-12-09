<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // ostukorvi vaade
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        // laeme tooted DB-st
        $products = Product::whereIn('id', array_keys($cart))->get();

        $total = 0;

        foreach ($products as $product) {
            $qty = $cart[$product->id] ?? 0;
            $total += $product->price * $qty;
        }

        return view('cart', compact('products', 'cart', 'total'));
    }

    // lisa korvi
    public function add(Product $product, Request $request)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]++;
        } else {
            $cart[$product->id] = 1;
        }

        $request->session()->put('cart', $cart);

        return back()->with('success', 'Toode lisatud ostukorvi');
    }

    // eemalda ühik või kogu rida
    public function remove(Product $product, Request $request)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            $request->session()->put('cart', $cart);
        }

        return back()->with('success', 'Toode eemaldatud ostukorvist');
    }

    // puhasta kogu cart (valikuline)
    public function clear(Request $request)
    {
        $request->session()->forget('cart');

        return back()->with('success', 'Ostukorv tühi');
    }
}
