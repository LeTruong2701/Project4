<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\bill_detail_ban;
use Illuminate\Http\Request;
use App\Models\bills_ban;
use \Datetime;
class Billsbancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return bills_ban::all();
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
        $db = new bills_ban();
        // $db=$request->all();
        // $db->id = $id;
        // Thêm thông tin hóa đơn 
        $db->id_kh = $request->id_kh;
        $db->ten_kh = $request->ten_kh;
        $db->sdt = $request->sdt;
        $db->diachi_giaohang = $request->diachi_giaohang;
        $db->date_order =new Datetime();
        $db->tong_tien = $request->tong_tien;
        $db->payment = $request->payment;
        $db->status = $request->status;
        $db->note = $request->note;
        $db->created_at = new Datetime();
        $db->updated_at = new Datetime();
        $db->save();

        // Lấy được mảng những sản phẩm vừa mới thêm từ cart
        $chitiet=$request->billdetailban;
        foreach($chitiet as $ct){
            // Thêm như trên
            $a=new bill_detail_ban();
            $a->id_bill_ban=$db->id;
            $a->id_sp=$ct['id_sp'];
            $a->size=$ct['size'];
            $a->color=$ct['color'];
            $a->sl=$ct['sl'];
            $a->unit_price=$ct['unit_price'];

            $a->save();
        }

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
        return bills_ban::findOrFail($id);
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
        $db = bills_ban::findOrFail($id);
        // $db=$request->all();
        // $db->id = $id;
        $db->id_kh = $request->id_kh;
        $db->ten_kh = $request->ten_kh;
        $db->sdt = $request->sdt;
        $db->diachi_giaohang = $request->diachi_giaohang;
        $db->date_order =new Datetime();
        $db->tong_tien = $request->tong_tien;
        $db->payment = $request->payment;
        $db->status = $request->status;
        $db->note = $request->note;
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
        bills_ban::findOrFail($id)->delete();
        return "Deleted";
    }
}