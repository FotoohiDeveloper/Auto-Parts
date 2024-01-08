<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function show()
    {
        $products = Product::all();
        return view('panel.products', compact('products'));
    }

    public function showBuy($id)
    {
        $product = Product::where('id', $id)->first();
        $user = auth()->user();
        return view('panel.checkout', compact(['product', 'user']));
    }

    public function buy(Request $request, $id)
    {
        $validate = Validator::make($req = $request->only('address'), [
            'address' => 'required|string'
        ]);

        if ($validate->fails())
        {
            $errors = $validate->getMessageBag();
            return redirect()->back()->with('errors', $errors);
        }

        $product = Product::where('id', $id)->first();
        if ($product)
        {
            $invoice = Invoice::create([
                'user_id' => auth()->user()->id,
                'product_id' => $product->id,
                'user_address' => $req['address']
            ]);

            if ($invoice)
            {
                return redirect()->route('success');
            }
        }
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

    public function showUpdate($id)
    {
        $product = Product::where('id', $id)->first();
        return view('panel.updateProduct', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        $validate = Validator::make($req = $request->only('name', 'description', 'price', 'brand', 'color'), [
            'name' => 'required|string',
            'description' => 'required|string',
            'brand' => 'required|string',
            'price' => 'required|string',
            'color' => 'required|string',
        ]);

        if ($validate->fails())
        {
            $errors = $validate->getMessageBag();
            return redirect()->back()->with('errors', $errors);
        }

        if ($product and $product->fill($req) and $product->save())
        {
            return redirect()->back()->with('success', 'محصول شما با موفقیت بروزرسانی شد');
        }

        return redirect()->back()->with('errors', ['حطایی رخ داد']);

    }

    public function showCreate()
    {
        return view('panel.addProduct');
    }

    public function create(Request $request)
    {
        $validate = Validator::make($req = $request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'color' => 'required|string',
            'brand' => 'required|string'
        ]);

        if ($validate->fails())
        {
            $errors = $validate->getMessageBag();
            return redirect()->back()->with('errors', $errors);
        }

        if (Product::create(array_merge(['admin_id' => auth()->user()->id], $req)))
        {
            return redirect()->back()->with('success', 'محصول شما با موفقیت اضافه شد');
        }

        return redirect()->back()->with('errors', ['حطایی رخ داد']);
    }
}
