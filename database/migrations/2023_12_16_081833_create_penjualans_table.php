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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal');
            $table->unsignedBigInteger('idpembeli');
            $table->unsignedBigInteger('idnota');
            $table->integer('totalharga');
            $table->integer('ongkir')->default(0);
            $table->integer('potongan')->default(0);
            $table->foreign('idpembeli')->references('id')->on('pembelis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
