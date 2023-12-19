<?php

namespace App\Http\Controllers;

use App\Models\Pengantaran;
use Illuminate\Http\Request;

class PengantaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data['pengantaran'] = Pengantaran::all();
        // dd($data['pengantaran']);
        return view('pengantaran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pengantaran.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pengantaran=new Pengantaran();
        $pengantaran->tanggal=$request->tanggal;
        $pengantaran->idpenjualan=$request->idpenjualan;
        $pengantaran->idsopir=$request->idsopir;
        $pengantaran->idtruk=$request->idtruk;
        $pengantaran->save();
        // redirect ke pengantaran.index
        return redirect()->route('pengantaran.index')->with('success', $request->nama_pengantaran.' berhasil disimpan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Pengantaran $pengantaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengantaran $pengantaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengantaran $pengantaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengantaran $pengantaran)
    {
        //
    }
}
