<?php

namespace App\Http\Controllers;

use App\Models\Barangjadi;
use Illuminate\Http\Request;
use App\Models\Barangmentah;

class BarangjadiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data['barangjadi'] = Barangjadi::all();
        // dd($data['barang']);
        return view('barangjadi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['barangmentah'] = Barangmentah::all();
        return view('barangjadi.add', $data);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'ukuran' => 'required',
            'jumlah' => 'required|min:1|numeric',
            'harga' => 'required|numeric',
         ]);
        $barangjadi= new Barangjadi();
        $barangjadi->nama=$request->nama;
        $barangjadi->ukuran=$request->ukuran;
        $barangjadi->jumlah=$request->jumlah;
        $barangjadi->harga=$request->harga;
        $barangjadi->save();
        // redirect ke barang.inde;x
        return redirect()->route('barangjadi.index')->with('success', $request->nama_barangjadi.' berhasil disimpan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Barangjadi $barangjadi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barangjadi $barangjadi)
    {
        $data['barangjadi'] = $barangjadi;
        return view('barangjadi.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barangjadi $barangjadi)
    {
        $this->validate($request,[
            'nama' => 'required',
            'ukuran' => 'required',
            'jumlah' => 'required|min:1|numeric',
            'harga' => 'required|numeric',
         ]);
        $barangjadi->nama = $request->nama;
        $barangjadi->ukuran = $request->ukuran;
        $barangjadi->jumlah = $request->jumlah;
        $barangjadi->harga = $request->harga;
        $barangjadi->save();

        return redirect()->route('barangjadi.index')->with('success', $request->nama_barangjadi . ' berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barangjadi $barangjadi)
    {
        $barangjadi->delete();

        return redirect()->route('barangjadi.index')->with('success', $barangjadi->nama . ' berhasil dihapus.');
//
    }
}
