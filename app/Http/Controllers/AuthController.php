<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\LoginRequest;


class AuthController extends Controller
{
    // signup (GET), signup(POST), login(GET), login(POST), logout(POST)
    public function showSignupForm()
    {
        return view('auth.signup',['title' => 'Signup']);
    }

    public function signup(SignupRequest $request)
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

        Auth::login($user);

        return redirect('/');
    }
    
    public function showLoginForm()
    {
        return view('auth.login',['title' => 'Login']);
    }
    
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials))
            {
                $request->session()->regenerate();
                
                return redirect('/');
            }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records'
        ])->withInput();
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
        // @TODO: Handle post request
    }
}
