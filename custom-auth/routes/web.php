<?php



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/home","HomeController@home")->name("home");

Route::get("/register","AuthController@register")->name("register");
Route::post("/register","AuthController@registerSave")->name("register");

Route::get("/login","AuthController@login")->name("login");
Route::post("/login","AuthController@loginCheck")->name("login");

Route::post("/logout","AuthController@logout")->name("logout");




//Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
