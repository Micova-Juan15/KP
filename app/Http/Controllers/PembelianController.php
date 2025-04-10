<?php

namespace App\Http\Controllers;

use App\Models\Barangmentah;
use App\Models\Detail_pembelian;
use App\Models\Pembelian;
use App\Models\Penjual;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

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
        $data['penjual'] = Penjual::all();
        $data['barang'] = Barangmentah::all();
        return view('pembelian.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            // 'ongkir' => 'required|numeric',
            'idnota' => 'required ',
            'idpenjual' => 'required',
        ]);
        // $this->validate($request,[
        //     'tanggal' => 'required|date',
        // 'totalharga' => 'required|min:0',
        //     'ongkir' => 'required|numeric',
        //     'idnota' => 'required',
        //     'potongan' => 'required|numeric',
        //     'idpenjual' => 'required',
        //  ]);

        $pembelian = new Pembelian();
        $pembelian->tanggal = $request->tanggal;
        $pembelian->totalharga = 0;
        $pembelian->ongkir = $request->ongkir ?? 0;
        $pembelian->idnota = $request->idnota;
        $pembelian->idpenjual = $request->idpenjual;
        $pembelian->keterangan = $request->keterangan;
        $pembelian->save();
        $totalharga = 0;
        $totalhargaasli = 0;

        for ($i = 0; $i < count($request->idbarang); $i++) {
            $detailpembelian = new Detail_pembelian();
            $detailpembelian->idpembelian = $pembelian->id;
            $detailpembelian->idbarang = $request->idbarang[$i];
            $detailpembelian->jumlah = $request->jumlah[$i];
            // $detailpembelian->hargabeli = $request->hargabeli[$i];
            $detailpembelian->save();
            $barangmentah = Barangmentah::find($request->idbarang[$i]);
            $barangmentah->jumlah = $barangmentah->jumlah + $request->jumlah[$i];
            $barangmentah->save();


            // $totalharga += ($request->hargabeli[$i]);
            // $totalhargaasli += ($barangmentah->harga * $request->jumlah[$i]);
            
        }

        // $pembelian->totalharga = $totalharga + $request->ongkir;
        // $pembelian->potongan = $totalhargaasli - $totalharga;
        $pembelian->save();
        // redirect ke pembelian.index
        return redirect()->route('pembelian.index')->with('success', $request->nama_pembelian . ' berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembelian $pembelian)
    {
        return view('pembelian.show', compact('pembelian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembelian $pembelian)
    {
        $data['penjual'] = Penjual::all();
        $data['pembelian'] = $pembelian;
        $data['barang'] = Barangmentah::all();
        return view('pembelian.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        // $this->validate($request, [
        //     'idpenjual' => 'required',
        //     'tanggal' => 'required',
        //     'idnota' => 'required',
        //     'ongkir' => 'required|numeric',
        // ]);
        $request->validate([
            'tanggal' => 'required|date',
            'ongkir' => 'required|numeric',
            'idnota' => 'required',
            'idpenjual' => 'required',
            'iddetail.*' => 'required|numeric',
            'idbarang.*' => 'required|numeric',
            'jumlah.*' => 'required|numeric|min:1',
            // 'hargabeli.*' => 'required|numeric|min:0',
        ]);
        $pembelian->tanggal = $request->tanggal;
        $pembelian->idpenjual = $request->idpenjual;
        $pembelian->idnota = $request->idnota;
        $pembelian->totalharga = 0;
        $pembelian->ongkir = $request->ongkir ?? 0;
        $pembelian->potongan = $request->potongan ?? 0;
        $pembelian->save();

        $totalharga = 0;
        $totalhargaasli = 0;
        
        for ($i = 0; $i < count($request->idbarang); $i++) {
            // $request->validate([
            //     'idbarang.' . $i => 'required|numeric',
            //     'jumlah.' . $i => 'required|numeric|min:1',
            //     'hargajual.' . $i => 'required|numeric|min:0',
            // ]);

            $detailpembelian = Detail_pembelian::find($request->iddetail[$i]);
            $detailpembelian->idbarang = $request->idbarang[$i];
            $detailpembelian->jumlah = $request->jumlah[$i];
            // $detailpembelian->hargabeli = $request->hargabeli[$i];
            $barangmentah = Barangmentah::find($request->idbarang[$i]);
            $barangmentah->jumlah = $barangmentah->jumlah - $detailpembelian->jumlah;
            $barangmentah->jumlah = $barangmentah->jumlah + $request->jumlah[$i];
            $barangmentah->save();
            $detailpembelian->save();

            // $totalharga += ($request->hargabeli[$i]);
            // $totalhargaasli += ($barangmentah->harga * $request->jumlah[$i]);
        }
        $pembelian->totalharga = $totalharga + $request->ongkir;
        // $pembelian->potongan = $totalhargaasli - $totalharga;
        $pembelian->save();
        return redirect()->route('pembelian.index')->with('success', $request->nama_pembelian . ' berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembelian $pembelian)
    {
        $pembelian->delete();

        return redirect()->route('pembelian.index')->with('success', $pembelian->nama . ' berhasil dihapus.');
    }
}
