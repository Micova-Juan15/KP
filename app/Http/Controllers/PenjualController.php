<?php

namespace App\Http\Controllers;

use App\Models\Penjual;
use Illuminate\Http\Request;

class PenjualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data['penjual'] = Penjual::all();
        // dd($data['penjual']);
        return view('penjual.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('penjual.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $penjual=new Penjual();
        $penjual->nama=$request->nama;
        $penjual->alamat=$request->alamat;
        $penjual->hp=$request->hp;
        $penjual->save();
        // redirect ke penjual.index
        return redirect()->route('penjual.index')->with('success', $request->nama_penjual.' berhasil disimpan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Penjual $penjual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjual $penjual)
    {
        $data['penjual'] = $penjual;
        // dd($data['penjual']);
        return view('penjual.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjual $penjual)
    {
        $penjual->nama=$request->nama;
        $penjual->alamat=$request->alamat;
        $penjual->hp=$request->hp;
        $penjual->save();
        // redirect ke penjual.index
        return redirect()->route('penjual.index')->with('success', $request->nama_penjual.' berhasil disimpan.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjual $penjual)
    {
        $penjual->delete();

        return redirect()->route('penjual.index')->with('success', $penjual->nama . ' berhasil dihapus.');
    }
}
