<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangmentah;

class BarangmentahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['barangmentah'] = Barangmentah::all();
        // dd($data['barang']);
        return view('barangmentah.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('barangmentah.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'nama' => 'required',
    //         // 'jumlah' => 'required|min:1|numeric',
    //         'jumlah' => 'required|numeric|gt:0',
    //         'satuan' => 'required',
    //         // 'harga' => 'required|numeric',
    //     ]);

    //     $barangmentah = new Barangmentah();
    //     $barangmentah->nama = $request->nama;
    //     $barangmentah->jumlah = $request->jumlah;
    //     $barangmentah->satuan = $request->satuan;
    //     // $barangmentah->harga = $request->harga;
    //     $barangmentah->harga = $request->harga ?? 0;
    //     $barangmentah->save();
    //     return redirect()->route('barangmentah.index')->with('success', $request->nama_barangmentah . ' berhasil disimpan.');
    // }
    public function store(Request $request)
    {
        // Normalisasi input desimal
        $request->merge([
            'jumlah' => str_replace(',', '.', $request->jumlah),
            // 'harga' => str_replace(',', '.', $request->harga),
        ]);

        $this->validate($request, [
            'nama' => 'required',
            'jumlah' => 'required|numeric|gt:0',
            'satuan' => 'required',
        ]);

        $barangmentah = new Barangmentah();
        $barangmentah->nama = $request->nama;
        $barangmentah->jumlah = $request->jumlah;
        $barangmentah->satuan = $request->satuan;
        $barangmentah->harga = $request->harga ?? 0;
        $barangmentah->save();

        return redirect()
            ->route('barangmentah.index')
            ->with('success', $request->nama . ' berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barangmentah $barangmentah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barangmentah $barangmentah)
    {
        $data['barangmentah'] = $barangmentah;
        return view('barangmentah.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barangmentah $barangmentah)
    {
        $request->merge([
            'jumlah' => str_replace(',', '.', $request->jumlah),
            // 'harga' => str_replace(',', '.', $request->harga),
        ]);

        $this->validate($request, [
            'nama' => 'required',
            'jumlah' => 'required|numeric|gt:0',
            'satuan' => 'required',
            // 'harga' => 'required|numeric',
        ]);

        $barangmentah->nama = $request->nama;
        $barangmentah->jumlah = $request->jumlah;
        $barangmentah->satuan = $request->satuan;
        // $barangmentah->harga = $request->harga;
        $barangmentah->save();

        return redirect()
            ->route('barangmentah.index')
            ->with('success', $request->nama . ' berhasil diperbarui.');
    }

    public function destroy(Barangmentah $barangmentah)
    {
        $barangmentah->delete();

        return redirect()->route('barangmentah.index')->with('success', 'Barang mentah berhasil dihapus.');
    }
}
