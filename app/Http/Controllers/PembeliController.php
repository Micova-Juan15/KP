<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data['pembeli'] = Pembeli::all();
        // dd($data['pembeli']);
        return view('pembeli.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pembeli.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pembeli= new Pembeli();
        $pembeli->nama=$request->nama;
        $pembeli->alamat=$request->alamat;
        $pembeli->hp=$request->hp;
        $pembeli->save();
        // redirect ke pembeli.index
        return redirect()->route('pembeli.index')->with('success', $request->nama_pembeli.' berhasil disimpan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Pembeli $pembeli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembeli $pembeli)
    {
        $data['pembeli'] = $pembeli;
        return view('pembeli.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembeli $pembeli)
    {
        $pembeli->nama=$request->nama;
        $pembeli->alamat=$request->alamat;
        $pembeli->hp=$request->hp;
        $pembeli->save();

        return redirect()->route('pembeli.index')->with('success', $request->nama_pembeli.' berhasil disimpan.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembeli $pembeli)
    {
        //
    }
}
