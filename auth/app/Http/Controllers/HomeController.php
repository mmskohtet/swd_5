<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function about(){

        $user = new User();
       if(count(User::find(Auth::user()->id)->getPhoto)){
           return "shi tal";
       }else{
           return "ma shi woo";
       }

    }

    public function photoUpload(){
        return "hello";
    }

    public function onlyAdmin(){
        return "here is admin space";

    }
}
