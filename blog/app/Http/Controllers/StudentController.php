<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

class StudentController extends Controller
{
    public function create(){
        return view("student.create");
    }

    public function store(Request $request){

        $fileName = uniqid();
        $fileExt = $request->file("photo")->getClientOriginalExtension();
        $newFileName = $fileName.".".$fileExt;
        $request->file("photo")->storeAs("my-file",$newFileName);


        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->nationality = $request->nationality;
        $student->skill = json_encode($request->skill);
        $student->photo = $newFileName;
        $student->save();


        return redirect()->route("student.index");
    }

    public function index(){
        $student = new Student();
        $list = $student->get();
//        return $list;
        return view("student.index",compact('list'));
    }
}
