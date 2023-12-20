<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_penjualans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idbarang');
            $table->integer('jumlah');
            $table->integer('hargajual');
            $table->unsignedBigInteger('idpenjualan');
            $table->foreign('idbarang')->references('id')->on('barangjadis');
            $table->foreign('idpenjualan')->references('id')->on('penjualans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualans');
    }
};
