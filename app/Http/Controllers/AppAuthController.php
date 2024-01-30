<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
use Laravel\Fortify\Rules\Password;

class AppAuthController
{
    public function login()
    {
        if(Auth::guard('web')->check()) // this means that the superadmin was logged in.
        {
            if(Auth::user()->type == 2){
                return redirect()->intended('/superadmin/dashboard');
            }
            else{
                Auth::guard('web')->logout();
                return redirect()->intended('/superadmin/login');
            }
        }
        return view('auth.app.login');
    }

    public function loginAction(Request $request)
    {
//        $request->validate($request, [
//            'email'   => 'required|email',
//            'password' => 'required|min:6'
//        ]);
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            if(Auth::user()->type == 2){
                return redirect()->intended('/superadmin/dashboard');
            }
            else{
                Auth::guard('web')->logout();
                return redirect()->intended('/superadmin/login');
            }
        }
        return redirect()->intended('/superadmin/login');
    }

    public function logout()
    {
        // dd();
        if(Auth::guard('web')->check()) // this means that the superadmin was logged in.
        {
            Auth::guard('web')->logout();
            return redirect()->intended('/superadmin/login');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerAction(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'string|max:20',
            'country' => 'string|max:20',
            'password' => 'required|string|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->intended('/superadmin/login');
    }

    protected function passwordRules()
    {
        return ['required', 'string', 'confirmed'];
    }
}
