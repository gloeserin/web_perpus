<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() 
    {
        return view('login');
    }
    public function register() 
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);

        $request['password'] = bcrypt($request['password']);
        User::create($request->all());
        return redirect()->route('login')->with('Succes', 'User created succesfully');
    }
    public function auth(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'email' => 'required|email:dns|exists:users,email',
            'password' => 'required',

        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard');
            } elseif (Auth::user()->role == 'user') {
                return redirect()->route('home');
            }
        } else {
            return redirect()->back()->with('error', 'invalid');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    
}
