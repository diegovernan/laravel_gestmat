<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', auth()->user()->id)->latest()->paginate(1);

        return view('products', compact('products'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->user_id = auth()->user()->id;
        $product->name = $request->name;
        $product->price = $request->price;

        $product->save();

        return redirect()->back()->with('success', 'Produto adicionado com sucesso!');
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
