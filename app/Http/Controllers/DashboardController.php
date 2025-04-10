<?php

namespace App\Http\Controllers;

use App\Models\Barangjadi;
use App\Models\Barangmentah;
use App\Models\Pembeli;
use App\Models\Pembelian;
use App\Models\Pengantaran;
use App\Models\Penjual;
use App\Models\Penjualan;
use App\Models\Sopir;
use App\Models\Truk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

        $data['pembelian'] = Pembelian::all();

        $data['penjualan'] = Penjualan::all();

        $data['pengantaranbelumselesai'] = Pengantaran::where('status', 0)
            ->get();

        $data['pengantaran'] = Pengantaran::all();

        $data['pengantaransudahselesai'] = Pengantaran::where('status', 1)
            ->get();
        $data['barangmentah'] = Barangmentah::all();
        $data['barangjadi'] = Barangjadi::all();
        $data['sopir'] = Sopir::all();
        $data['penjual'] = Penjual::all();
        $data['pembeli'] = Pembeli::all();
        $data['truk'] = Truk::all();
        $data['user'] = User::all();
        // $tahun=date("Y");
        // $data['grafik']= DB::select("SELECT substr(tanggal, 6, 2) as bulan, sum(totalharga) as totalharga FROM `penjualans` WHERE LEFT(tanggal, 4) = $tahun GROUP by substr(tanggal, 6, 2);");
        // return view('dashboard', $data);
        $tahun = date("Y");
        $data['grafik'] = DB::select("
            SELECT 
                MONTH(tanggal) as bulan, 
                COALESCE(SUM(totalharga), 0) as totalharga 
            FROM `penjualans` 
            WHERE YEAR(tanggal) = $tahun 
            GROUP BY MONTH(tanggal)
            ORDER BY MONTH(tanggal);
        ");
        return view('dashboard', $data);
    }
}
