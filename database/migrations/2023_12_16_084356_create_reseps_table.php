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
        Schema::create('reseps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idbarangjadi');
            $table->unsignedBigInteger('idbarangmentah');
            $table->integer('jumlah');
            $table->foreign('idbarangjadi')->references('id')->on('barangjadis');
            $table->foreign('idbarangmentah')->references('id')->on('barangmentahs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reseps');
    }
};
