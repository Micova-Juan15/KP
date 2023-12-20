<?php

use App\Models\Penjual;
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
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal');
            $table->integer('totalharga')->default(0);
            $table->integer('ongkir')->default(0);
            $table->string('idnota');
            $table->integer('potongan')->default(0);
            $table->unsignedBigInteger('idpenjual');
            $table->foreign('idpenjual')->references('id')->on('penjuals');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelians');
    }
};
