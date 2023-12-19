<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        $products = Product::latest()->paginate(5);
        return view('products.index', ['products' => $products]);
    }
    public function create() {
        return view('products.create');
    }
    public function store(Request $request) {
        //Validate Data
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'image'       => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price'       => 'required',
            'quantity'    => 'required',
        ]);

        //Upload Images
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        $product              = new Product;
        $product->image       = $imageName;
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->price       = $request->price;
        $product->quantity    = $request->quantity;

        $product->save();
        return back()->withSuccess('Product Added Successfully');
    }
    public function edit($id) {
        $product = Product::where('id', $id)->first();
        return view('products.edit', ['product' => $product]);
    }
    public function update(Request $request, $id) {
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'image'       => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price'       => 'required',
            'quantity'    => 'required',
        ]);

        $product = Product::where('id', $id)->first();
        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }

        $product->name        = $request->name;
        $product->description = $request->description;
        $product->price       = $request->price;
        $product->quantity    = $request->quantity;

        $product->save();
        return back()->withSuccess('Product Updated Successfully');
    }
    public function destroy($id) {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return back()->withSuccess('Product Deleted Successfully');
    }
    public function show($id) {
        $product = Product::where('id', $id)->first();
        return view('products.show', ['product' => $product]);
    }
}
