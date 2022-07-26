<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kho;

class KhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $data= kho::all();
        // return json_encode($data);
        return kho::all();
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
        $db = new kho();
        // $db=$request->all();
        // $db->id = $id;
        $db->id = $request->id;
        $db->id_sp = $request->id_sp;
        $db->sl = $request->sl;
        
        
      
        $db->save();
        return $db;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\loaisp  $loaisp
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return kho::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\loaisp  $loaisp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\loaisp  $loaisp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = new kho();
        // $db=$request->all();
        // $db->id = $id;
        $db->id = $request->id;
        $db->id_sp = $request->id_sp;
        $db->sl = $request->sl;
        
        
      
        $db->save();
        return $db;
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\loaisp  $loaisp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        kho::findOrFail($id)->delete();
        return "Deleted";

    }
}
