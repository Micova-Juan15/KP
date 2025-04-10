<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transfer_barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->constrained('barang')->onDelete('cascade');
            $table->foreignId('gudang_asal_id')->constrained('gudang')->onDelete('cascade');
            $table->foreignId('gudang_tujuan_id')->constrained('gudang')->onDelete('cascade');
            $table->integer('jumlah');
            $table->date('tanggal_transfer');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transfer_barang');
    }
};
