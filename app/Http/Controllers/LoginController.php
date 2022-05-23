<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $req){
        if(Auth::check()){
            return redirect()->intended(route('home'));
        }

        $formFields = $req->only(['email','password']);

        if(Auth::attempt($formFields)){
            return redirect()->intended(route('home'));
        }

        return redirect(route('user.login'))->withErrors([
            'email' => 'Email или пароль введены не верно'
        ]);
    }
}
