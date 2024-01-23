<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use App\Models\Pengantaran;
use App\Models\Penjualan;
use App\Models\Sopir;
use App\Models\Truk;
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
    public function cetak(Pengantaran $pengantaran)
    {
        // dd($data['pengantaran']);
        return view('pengantaran.cetak',compact('pengantaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['penjualan'] = Penjualan::all();
        $data['sopir'] = Sopir::all();
        $data['truk'] = Truk::all();

        return view('pengantaran.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'tanggal' => 'required|date',
            'idtruk' => 'required',
            'idsopir' => 'required',
            'idpenjualan' => 'required',
         ]);

        $pengantaran=new Pengantaran();
        $pengantaran->tanggal=$request->tanggal;
        $pengantaran->idpenjualan=$request->idpenjualan;
        $pengantaran->idsopir=$request->idsopir;
        $pengantaran->idtruk=$request->idtruk;
        $pengantaran->ongkir=$request->ongkir;
        $pengantaran->status=$request->status;
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
        $data['penjualan'] = Penjualan::all();
        $data['pengantaran'] = $pengantaran;
        $data['sopir'] = Sopir::all();
        $data['truk'] = Truk::all();

        return view('pengantaran.edit',$data);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengantaran $pengantaran)
    {
        $this->validate($request,[
            'tanggal' => 'required|date',
            'idtruk' => 'required',
            'idsopir' => 'required',
            'idpenjualan' => 'required',
         ]);

        $pengantaran->tanggal=$request->tanggal;
        $pengantaran->idpenjualan=$request->idpenjualan;
        $pengantaran->idsopir=$request->idsopir;
        $pengantaran->idtruk=$request->idtruk;
        $pengantaran->ongkir=$request->ongkir;
        $pengantaran->status=$request->status;
        $pengantaran->save();
        // redirect ke pengantaran.index
        return redirect()->route('pengantaran.index')->with('success', $request->nama_pengantaran.' berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengantaran $pengantaran)
    {
        $pengantaran->delete();
        return redirect()->route('pengantaran.index')->with('success', $pengantaran->nama . ' berhasil dihapus.');
    }
    public function selesaikan(Pengantaran $pengantaran)
    {
        $pengantaran->status=1;
        $pengantaran->save();
        
        $sopir = Sopir::find($pengantaran->idsopir);
        $sopir->ketersediaan=1;
        // dd($sopir);
        $sopir->save();
        
        $truk = Truk::find($pengantaran->idtruk);
        $truk->ketersediaan=1;
        $truk->save();
        return redirect()->route('pengantaran.index')->with('success', $pengantaran->nama . ' telah diselesaikan.');
    }
}
