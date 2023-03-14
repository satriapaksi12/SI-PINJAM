<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasi_ruang_sesi', function (Blueprint $table) {
            $table->unsignedBigInteger('reservasi_ruang_id');
            $table->foreign('reservasi_ruang_id')->references('id')->on('reservasi_ruangs')->onDelete('restrict');
            $table->unsignedBigInteger('sesi_id');
            $table->foreign('sesi_id')->references('id')->on('sesis')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservasi_ruang_sesi');
    }
};
