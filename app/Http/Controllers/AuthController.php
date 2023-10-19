<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credential)){
            return redirect()->route('home');
        }else{
            return redirect()->route('login')->with('message','Email Or Password Incorrect !');
        }
    }

    public function register(Request $request)
    {
        Validator::make($request->all(),[
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
            'confirm_password' => 'same:password'
        ])->validate();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
