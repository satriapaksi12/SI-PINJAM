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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('no_polisi', 191)->unique();
            $table->integer('kapasitas');
            $table->timestamps();
            $table->unsignedBigInteger('gedung_id');
            $table->foreign('gedung_id')->references('id')->on('gedungs')->onDelete('cascade');
            $table->unsignedBigInteger('jenis_kendaraan_id');
            $table->foreign('jenis_kendaraan_id')->references('id')->on('jenis_kendaraans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraans');
    }
};
