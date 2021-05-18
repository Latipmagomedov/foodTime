<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function applicationPost(Request $request)
    {
        Application::create($request->all());
    }

    public function applicationGet(Request $request)
    {
        return response()->json([
            "orders" => Application::latest()->get(),
        ], 200);
    }

    public function removeOrder($id)
    {
        if (auth()->user()) {
            Application::find($id)->delete();
            return redirect()->route("admin-orders");
        }
    }
}
