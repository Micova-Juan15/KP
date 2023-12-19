<?php

namespace App\Http\Controllers;

use App\Models\Truk;
use Illuminate\Http\Request;

class TrukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data['truk'] = Truk::all();
        // dd($data['truk']);
        return view('truk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('truk.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $truk=new Truk();
        $truk->plat=$request->plat;
        $truk->save();
        // redirect ke truk.index
        return redirect()->route('truk.index')->with('success', $request->nama_truk.' berhasil disimpan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Truk $truk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Truk $truk)
    {
        $data['truk'] = $truk;
        // dd($data['truk']);
        return view('truk.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Truk $truk)
    {
        $truk->plat=$request->plat;
        $truk->save();
        return redirect()->route('truk.index')->with('success', $request->nama_truk.' berhasil disimpan.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Truk $truk)
    {
        $truk->delete();

        return redirect()->route('truk.index')->with('success', $truk->nama . ' berhasil dihapus.');
    }
}
