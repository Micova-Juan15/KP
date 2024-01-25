<?php

namespace App\Http\Controllers;

use App\Models\Barangjadi;
use Illuminate\Http\Request;
use App\Models\Barangmentah;
use App\Models\Resep;

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
            'jumlahbarang' => 'required|min:1|numeric',
            'harga' => 'required|numeric',
         ]);
        $barangjadi= new Barangjadi();
        $barangjadi->nama=$request->nama;
        $barangjadi->ukuran=$request->ukuran;
        $barangjadi->jumlah=$request->jumlahbarang;
        $barangjadi->harga=$request->harga;
        $barangjadi->save();
        for ($i=0; $i < count($request->idbarang); $i++) { 
            $resep = new Resep();
            $resep->idbarangjadi = $barangjadi->id;
            $resep->idbarangmentah = $request->idbarang[$i];
            $resep->jumlah = $request->jumlah[$i];
            $resep->save();
        }
        // redirect ke barang.inde;x
        return redirect()->route('barangjadi.index')->with('success', $request->nama_barangjadi.' berhasil disimpan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Barangjadi $barangjadi)
    {
        return view('barangjadi.show',compact('barangjadi'));
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

    public function convert(Barangjadi $barangjadi)
    {
        $data['barangjadi'] = Barangjadi::all();
        return view('barangjadi.convert',$data);
    }

    public function tambahbarangjadi(Request $request)
    {
        
        $barangjadi=Barangjadi::find($request->idbarangjadi);
        $barangjadi->jumlah=$barangjadi->jumlah+$request->jumlah;
        for ($i=0; $i < count($barangjadi->resep); $i++) { 
            $barangmentah=Barangmentah::find($barangjadi->resep[$i]->idbarangmentah);
            $hasil= $barangmentah->jumlah-($barangjadi->resep[$i]->jumlah*$request->jumlah);
            if($hasil<0)
            {
                return redirect()->route('barangjadi.index')->with('warning', $barangmentah->nama.' kekurangan stock');

            }
            $barangmentah->jumlah=$barangmentah->jumlah-($barangjadi->resep[$i]->jumlah*$request->jumlah);
            $barangmentah->save();
        }
        $barangjadi->save();
        return redirect()->route('barangjadi.index')->with('success', $request->nama_barangjadi.' berhasil disimpan.');
    }
    

}

