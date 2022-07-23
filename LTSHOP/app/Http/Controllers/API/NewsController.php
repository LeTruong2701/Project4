<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\news;
use Illuminate\Http\Request;

use \Datetime;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return news::all();
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
        $db = new news();
        // $db=$request->all();
        // $db->id = $id;
        $db->title=$request->title;
        $db->content=$request->content;
        $db->image=$request->image;
        
        $db->created_at = new Datetime();
        $db->updated_at = new Datetime();
        $db->save();
        return $db;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return news::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(news $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, news $news,$id)
    {
        //
        

        

        $db = news::findOrFail($id);
        // $db=$request->all();
        // $db->id = $id;
        $db->title=$request->title;
        $db->content=$request->content;
        $db->image=$request->image;
        
        $db->created_at = new Datetime();
        $db->updated_at = new Datetime();
        $db->save();
        return $db;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        news::findOrFail($id)->delete();
        return "Deleted";
    }
}
