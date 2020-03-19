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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
Route::get("/about","HomeController@about")->name("about");

Route::get("/only-admin","HomeController@onlyAdmin")->name("only.admin")->middleware("isAdmin");
Route::get("/access-denied",function (){
    return "access denied";
})->name("access.denied");

Route::get('/user-image-upload', 'HomeController@photoUpload')->name('user.image.upload');
