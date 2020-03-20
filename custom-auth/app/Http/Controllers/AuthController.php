<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(){
        return view("register");
    }

    public function registerSave(Request $request){

        $request->validate([
            "name"=> "required|min:4|max:20",
            "email"=> "required|unique:users,email|",
            "password"=> "required|confirmed|min:8",
            "password_confirmation"=> "required"
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $c = $request->only("email","password");

        if(Auth::attempt($c)){
            return redirect()->route("home");
        }

    }

    public function login(){
        return view("login");
    }

    public function loginCheck(Request $request){

        $request->validate([
           "email" => "required",
           "password" => "required"
        ]);

        $c = $request->only("email","password");

        if(Auth::attempt($c)){
            return redirect()->route("home");
        }


    }

    public function logout(){

        Auth::logout();

        return redirect()->route("login");

    }

}
