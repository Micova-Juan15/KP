<?php

namespace App\Http\Controllers;

use App\Models\Barangmentah;
use App\Models\Detail_pembelian;
use App\Models\Pembelian;
use App\Models\Penjual;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data['pembelian'] = Pembelian::all();
        // dd($data['pembelian']);
        return view('pembelian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['penjual'] = Penjual::all();
        $data['barang'] = Barangmentah::all();
        return view('pembelian.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'tanggal' => 'required|date',
        //     'totalharga' => 'required|numeric',
        //     'ongkir' => 'required|numeric',
        //     'idnota' => 'required',
        //     'potongan' => 'required|numeric',
        //     'idpenjual' => 'required',
        //  ]);

        $pembelian= new Pembelian();
        $pembelian->tanggal=$request->tanggal;
        $pembelian->totalharga=0;
        $pembelian->ongkir=$request->ongkir??0;
        $pembelian->idnota=$request->idnota;
        $pembelian->potongan=$request->potongan??0;
        $pembelian->idpenjual=$request->idpenjual;
        $pembelian->save();

        for ($i=0; $i < count($request->idbarang); $i++) { 
            $detailpembelian = new Detail_pembelian();
            $detailpembelian->idpembelian = $pembelian->id;
            $detailpembelian->idbarang = $request->idbarang[$i];
            $detailpembelian->jumlah = $request->jumlah[$i];
            $detailpembelian->hargabeli = $request->hargabeli[$i];
            $detailpembelian->save();
        }
        // redirect ke pembelian.index
        return redirect()->route('pembelian.index')->with('success', $request->nama_pembelian.' berhasil disimpan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }
}
