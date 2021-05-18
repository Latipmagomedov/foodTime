<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class MainController extends Controller
{
    public function home()
    {
        return view('home', ['categories' => Category::all(), 'products' => Product::latest()->limit(9)->get()]);
    }

    public function menu()
    {
        Paginator::useBootstrap();
        return view('menu', ['categories' => Category::all(), 'products' => Product::latest()->paginate(15)]);
    }

    public function category(Request $request, $code)
    {
        Paginator::useBootstrap();
        $categoryProducts = Product::where('code', $code)->paginate(15);

        $path = $request->path();
        return view('menu', ['categories' => Category::all(), 'products' => $categoryProducts]);
    }

    public function categoryAdmin(Request $request, $code)
    {
        if (auth()->user()) {
            Paginator::useBootstrap();
            $categoryProducts = Product::where('code', $code)->paginate(15);
            $path = $request->path();
            return view('admin', ['categories' => Category::all(), 'products' => $categoryProducts]);
        }
        return redirect()->route('admin-signin');
    }

    public function admin()
    {
        if (auth()->user()) {
            Paginator::useBootstrap();
            return view('admin', ['categories' => Category::all(), 'products' => Product::latest()->paginate(15)]);
        }
        return redirect()->route('admin-signin');
    }

    public function adminOrders()
    {
        if (auth()->user()) {
            return view("admin-orders");
        }
        return redirect()->route('admin-signin');
    }

    public function adminAddCategory()
    {
        if (auth()->user()) {
            return view("admin-add-category", ['categories' => Category::all()]);
        }
        return redirect()->route('admin-signin');
    }

    public function signIn()
    {
        if (auth()->user()) {
            return redirect()->route("admin");
        }
        return view("signin");
    }

    public function signUp()
    {
        if(auth()->user()) {
           return view("signup");
        }
        return redirect()->route('admin-signin');
    }
}
