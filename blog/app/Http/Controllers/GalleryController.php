<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Photo;
use Faker\Provider\Address;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("gallery.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request;
        if($request->hasFile("photo")){

            if(count($request->file("photo")) > 3){

                return redirect()->back()->withErrors(["photo.*" => "more than 3"]);

            }else{

                $request->validate([

                    "photo.*" => "mimes:jpeg,png|max:1000",
                    "description" => "required"

                ]);

                $store = "gallery_photo";


                $gallery = new Gallery();
                $gallery->description = $request->description;
                $gallery->save();


                foreach($request->file("photo") as $photo){
                    $newName = uniqid()."_gallery.".$photo->getClientOriginalExtension();
                    $fullPath = $store."/".$newName;
                    $photo->move($store,$newName);
                    $photo = new Photo();
                    $photo->gallery_id = $gallery->id;
                    $photo->location = $fullPath;
                    $photo->save();

                }

                return "aung P";


            }

        }else{

            return redirect()->back()->withErrors(["photo.*" => "there is no file"]);
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        //
    }
}
