<?php

namespace App\Http\Controllers;

use App\Models\Sopir;
use Illuminate\Http\Request;

class SopirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data['sopir'] = Sopir::all();
        // dd($data['sopir']);
        return view('sopir.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('sopir.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sopir=new Sopir();
        $sopir->nama=$request->nama;
        $sopir-> save();
        // redirect ke sopir.index
        return redirect()->route('sopir.index')->with('success', $request->nama_sopir.' berhasil disimpan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Sopir $sopir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sopir $sopir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sopir $sopir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sopir $sopir)
    {
        //
    }
}
