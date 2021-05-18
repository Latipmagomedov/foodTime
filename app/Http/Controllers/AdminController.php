<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function addProduct(Request $request)
    {
        if (auth()->user()) {
            $validated = $request->validate([
                'title' => 'required',
                'cost' => 'required',
                'image' => 'required',
            ]);

            $path = $request->file('image')->store('products');

            $product = new Product();
            $product->title = $request->title;
            $product->description = $request->description;
            $product->cost = $request->cost;
            $product->code = $request->code;
            $product->image = $path;

            $product->save();

            return redirect()->route('admin');
        }
    }

    public function removeProduct($id)
    {
        if (auth()->user()) {
            Product::find($id)->delete();
            return redirect()->route("admin");
        }
    }

    public function addCategory(Request $request)
    {
        if (auth()->user()) {
            Category::create($request->all());
            return redirect()->route('admin-add-category');
        }
    }


    public function removeCategory($id)
    {
        if (auth()->user()) {
            Category::find($id)->delete();
            return redirect()->route("admin-add-category");
        }
    }
}
