<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_pembelians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idbarang');
            $table->integer('jumlah');
            $table->string('hargabeli');
            $table->unsignedBigInteger('idpembelian');
            $table->foreign('idpembelian')->references('id')->on('pembelians');
            $table->foreign('idbarang')->references('id')->on('barangmentahs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembelians');
    }
};
