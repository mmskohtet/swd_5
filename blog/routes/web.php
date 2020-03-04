<?php


Route::view("/","index");
Route::view("/about","about");

Route::get("/student/create","StudentController@create")->name("student.create");

