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
            $table->double('jumlah');
            $table->foreign('idbarangjadi')->references('id')->on('barangjadis')->onDelete('cascade');
            $table->foreign('idbarangmentah')->references('id')->on('barangmentahs')->onDelete('cascade');
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
