<?php

namespace App\Http\Controllers;

use App\Models\Barangjadi;
use App\Models\Detail_penjualan;
use App\Models\Pembeli;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data['penjualan'] = Penjualan::all();
        // dd($data['penjualan']);
        return view('penjualan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pembeli'] = Pembeli::all();
        $data['barang'] = Barangjadi::all();
        // dd($data['penjualan']);

        return view('penjualan.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'tanggal' => 'required|date',
        //     'idpembeli' => 'required',
        //     'idnota' => 'required',
        //     'totalharga' => 'required|numeric',
        //     'ongkir' => 'required|numeric',
        //     'potongan' => 'required|numeric',
        // ]);

        $penjualan=new Penjualan();
        $penjualan->tanggal=$request->tanggal;
        $penjualan->idpembeli=$request->idpembeli;
        $penjualan->idnota=$request->idnota;
        $penjualan->totalharga=0;
        $penjualan->ongkir=$request->ongkir??0;
        $penjualan->potongan=$request->potongan??0;
        $penjualan->save();
        
        for ($i=0; $i < count($request->idbarang); $i++) { 
            $detailpenjualan = new Detail_penjualan();
            $detailpenjualan->idpenjualan = $penjualan->id;
            $detailpenjualan->idbarang = $request->idbarang[$i];
            $detailpenjualan->jumlah = $request->jumlah[$i];
            $detailpenjualan->hargajual = $request->hargajual[$i];
            $detailpenjualan->save();
        }

        // redirect ke penjualan.index
        return redirect()->route('penjualan.index')->with('success', $request->nama_penjualan.' berhasil disimpan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
