<?php


Route::view("/","index");
Route::view("/about","about");

Route::get("/student/create","StudentController@create")->name("student.create");
Route::post("/student/create","StudentController@store")->name("student.store");
Route::get("/student","StudentController@index")->name("student.index");

Route::resource("/gallery","GalleryController");

Route::resource("/certificate","CertificateController");
Route::post("certificate-search","CertificateController@search")->name("certificate.search");

