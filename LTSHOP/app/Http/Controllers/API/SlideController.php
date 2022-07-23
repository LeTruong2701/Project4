<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data= slide::all();
        return json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $db = new slide();
        // $db=$request->all();
        // $db->id = $id;
        $db->link=$request->link;
        $db->image=$request->image;
        
        $db->save();
        return $db;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
        $data =slide::find($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(slide $slide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $db = slide::findOrFail($id);
 

      
        $db->link=$request->link;
        $db->image=$request->image;
      
        
       
        $db->save();
        return $db;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        slide::findOrFail($id)->delete();
        return "Deleted";
    }
}
