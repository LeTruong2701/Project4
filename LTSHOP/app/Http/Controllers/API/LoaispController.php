<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\loaisp;
use \Datetime;


class LoaispController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return loaisp::all();
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
        $db = new loaisp();
        // $db=$request->all();
        // $db->id = $id;
        $db->id = $request->id;
        $db->tenloai = $request->tenloai;
        $db->Delet = $request->Delet;
        $db->created_at = new Datetime();
        $db->updated_at = new Datetime();
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
        return loaisp::findOrFail($id);
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
        $db = loaisp::findOrFail($id);
        // $db=$request->all();
        // $db->id = $id;
        $db->id = $request->id;
        $db->tenloai = $request->tenloai;
        $db->Delet = $request->Delet;
        $db->created_at = new DateTime();
        $db->updated_at = new Datetime();
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
        loaisp::findOrFail($id)->delete();
        return "Deleted";
    }
}
