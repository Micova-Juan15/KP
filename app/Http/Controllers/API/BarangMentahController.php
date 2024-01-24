<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Barangmentah;
use Illuminate\Http\Request;

class BarangMentahController extends Controller
{
    function show(string $id) {
        try {
            $barang = Barangmentah::find($id);
            if ($barang) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Data berhasil ditampilkan',
                    'data' => $barang
                ],200);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Data tidak ditemukan',
                ],400);
            }
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => 400,
                'message' => 'Data gagal ditampilkan',
                'error' => $e->getMessage()
            ],400);
        }
    }
}
