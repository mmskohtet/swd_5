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
        $lists = Certificate::latest()->get();
        return view("certificate.index",compact("lists"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $certificate = new Certificate();
        $lists = $certificate->latest()->get();

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
            "name" => "required",
            "nrc" => "required|unique:certificates,nrc"
        ]);

        //insert data
        $certificate = new Certificate();
        $certificate->name = $request->name;
        $certificate->nrc = $request->nrc;
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


        $certificate->name = $request->name;
        $certificate->nrc = $request->nrc;
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
