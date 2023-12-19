<?php

namespace App\Http\Controllers;

use App\Models\Barangmentah;
use App\Models\Pembelian;
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
        $data['barang'] = Barangmentah::all();

        return view('pembelian.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pembelian= new Pembelian();
        $pembelian->tanggal=$request->tanggal;
        $pembelian->totalharga=$request->totalharga;
        $pembelian->ongkir=$request->ongkir;
        $pembelian->idnota=$request->idnota;
        $pembelian->potongan=$request->potongan;
        $pembelian->idpenjual=$request->idpenjual;
        $pembelian->save();
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
