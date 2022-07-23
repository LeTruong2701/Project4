<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bill_detail_nhap;
use \Datetime;
class Billdetailnhapcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return bill_detail_nhap::all();
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
        $db = new bill_detail_nhap();
        // $db=$request->all();
        // $db->id = $id;
        $db->id_bill_ban = $request->id_bill_ban;
        $db->id_sp = $request->id_sp;
        $db->sl = $request->sl;
        $db->don_vi = $request->don_vi;
       
        $db->created_at = new Datetime();
        $db->updated_at = new Datetime();
        $db->save();
        return $db;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return bill_detail_nhap::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = bill_detail_nhap::findOrFail($id);
        // $db=$request->all();
        // $db->id = $id;
        $db->id_bill_ban = $request->id_bill_ban;
        $db->id_sp = $request->id_sp;
        $db->sl = $request->sl;
        $db->don_vi = $request->don_vi;
       
        $db->created_at = new Datetime();
        $db->updated_at = new Datetime();
        $db->save();
        return $db;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        bill_detail_nhap::findOrFail($id)->delete();
        return "Deleted";
    }
}