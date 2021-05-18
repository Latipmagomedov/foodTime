<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signUp(Request $request) {
        $validated = $request->validate([
            'login' => 'required|unique:users',
            'password' => 'required|min:3',
            'conf_password' => 'required|same:password',
        ]);

        User::create([
            'login' => $request->login,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin-signin');
    }

    public function signIn(Request $request) {
        $validated = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        if(!Auth::attempt($request->only(['login', 'password']), $request->has('remember') )) {
            return redirect()->back()->with("info", "Неправильный логин или пароль");
        }
        return redirect()->route('admin');
    }

    public function signOut() {
        Auth::logout();
        return redirect()->route('home');
    }
}
