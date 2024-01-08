<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show()
    {

        return view('panel.products');
    }

    public function showBuy($id)
    {

    }

    public function buy(Request $request, $id)
    {

    }

    public function list()
    {
        $products = Product::all();
        return view('panel.products.list', compact('products'));
    }

    public function delete($id)
    {
        $product = Product::where('id', $id)->first();
        if ($product)
        {
            $product->delete();
        }
        return redirect()->route('products.list');
    }

    public function showUpdate()
    {
        
    }

    public function update(Request $request)
    {

    }
}
