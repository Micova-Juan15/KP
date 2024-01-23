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
        Schema::create('pengantarans', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(1);
            $table->dateTime('tanggal');
            $table->integer('ongkir')->default(0);
            $table->unsignedBigInteger('idpenjualan');
            $table->unsignedBigInteger('idsopir');
            $table->unsignedBigInteger('idtruk');
            $table->foreign('idpenjualan')->references('id')->on('penjualans');
            $table->foreign('idsopir')->references('id')->on('sopirs');
            $table->foreign('idtruk')->references('id')->on('truks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengantarans');
    }
};
