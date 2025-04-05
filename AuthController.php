<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public  function loginview()
    {
        return view('dashboard.users.login');
    }
    public  function login(Request $request)
    {
        $data = $request->validate([

            'email' => 'required|email',
            'password' => 'required|min:8',

        ]);

        if (Auth::attempt($data)) 
        {
            $user = Auth::user();

            // Redirect based on user role
            if ($user->usertype == 'admin') {
                return redirect()->route('menu.show'); } // Admin menu page
          else {
            return redirect()->route('website.website');
          }

        }

        return back()->withErrors(['email' => 'Invalid credentials']);
     
    }



    public function registerview()
    {
        return view('dashboard.users.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => 'user', 
        ]);
        Auth::login($user);
        return redirect()->route('users.login')->with('success', 'Registration successful, login Now');
    }

    
    public function logout(Request $request)
    {
        Auth::logout();
        // return redirect()->route('users.login')->with('success', 'Logged Out Successfully');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('users.login');
    }

    public function website()
    {
        return view('website.website');
    }
}
