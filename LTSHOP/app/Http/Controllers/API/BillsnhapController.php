<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bills_nhap;
use \Datetime;
class Billsnhapcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return bills_nhap::all();
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
        $db = new bills_nhap();
        // $db=$request->all();
        // $db->id = $id;
        $db->id_ncc = $request->id_ncc;
        $db->id_nhanvien = $request->id_nhanvien;
        $db->date_order = $request->date_order;
        $db->tong_tien = $request->tong_tien;
        $db->thanh_toan = $request->thanh_toan;
        $db->note= $request->note;
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
        return bills_nhap::findOrFail($id);
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
        $db = bills_nhap::findOrFail($id);
        // $db=$request->all();
        // $db->id = $id;
        $db->id_ncc = $request->id_ncc;
        $db->id_nhanvien = $request->id_nhanvien;
        $db->date_order = $request->date_order;
        $db->tong_tien = $request->tong_tien;
        $db->thanh_toan = $request->thanh_toan;
        $db->note= $request->note;
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
        bills_nhap::findOrFail($id)->delete();
        return "Deleted";
    }
}