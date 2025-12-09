<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // tootenimekiri
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('admin.products.index', compact('products'));
    }

    // uus toode vorm
    public function create()
    {
        return view('admin.products.create');
    }

    // salvestus
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'sizes'       => 'nullable|string',
            'colors'      => 'nullable|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        // pildi upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['image_path'] = $path;
        }

        Product::create($data);

// kui tuli shopist → mine tagasi sinna
if ($request->filled('return_to')) {
    return redirect($request->return_to)
        ->with('success', 'Toode lisatud');
}

// muidu admini listi
return redirect()->route('admin.products.index')
    ->with('success', 'Toode lisatud');
    }

    // muutmise vorm
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // uuendamine
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'sizes'       => 'nullable|string',
            'colors'      => 'nullable|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['image_path'] = $path;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Toode uuendatud');
    }

    // kustutamine
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Toode kustutatud');
    }
}
