<?php

namespace App\Http\Controllers;

use App\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Certificate::latest()->paginate(5);
        return view("certificate.index",compact("lists"));
    }

    public function search(Request $request){

        $request->validate([
            "search" => "required|max:50"
        ]);

        $certificate = new Certificate();
        $lists = $certificate->where("name","LIKE","%$request->search%")->paginate(5);
        return view("certificate.create",compact("lists"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $certificate = new Certificate();
        $lists = $certificate->latest()->paginate(5);

        return  view("certificate.create",compact("lists"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            "photo" => "required|mimes:jpeg,png,gif|max:1000|dimensions:ratio=1",
            "name" => "required",
            "nrc" => "required|unique:certificates,nrc"
        ]);




        $dir = "img/";
        $randName = uniqid()."_photo.".$request->file("photo")->getClientOriginalExtension();

        $request->file("photo")->move($dir,$randName);





        //insert data
        $certificate = new Certificate();
        $certificate->name = $request->name;
        $certificate->nrc = $request->nrc;
        $certificate->photo = $dir.$randName;
        $certificate->save();

        //response

        return redirect()->route("certificate.create")->with("status","$request->name's Certificate Added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        return $certificate;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        $info = $certificate;
        return view("certificate.edit",compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {


        $request->validate([
            "photo" => "sometimes|mimes:jpeg,png,gif|max:1000|dimensions:ratio=1",
            "name" => "required",
            "nrc" => "required|unique:certificates,nrc,".$certificate->id
        ]);


        $certificate->name = $request->name;
        $certificate->nrc = $request->nrc;

        if($request->hasFile("photo")){

            $dir = "img/";
            $randName = uniqid()."_photo.".$request->file("photo")->getClientOriginalExtension();

            $request->file("photo")->move($dir,$randName);
            $certificate->photo = $dir.$randName;

        }


        $certificate->update();
        return redirect()->route("certificate.index")->with("status","Update Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        $name = $certificate->name;
        $certificate->delete();

        return redirect()->back()->with("status","$name is deleted ...");
    }
}
