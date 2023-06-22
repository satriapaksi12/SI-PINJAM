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
        Schema::create('ruangs', function (Blueprint $table) {
            $table->id();
            $table->string('no_ruang')->unique();
            $table->string('nama_ruang');
            $table->string('fasilitas');
            $table->integer('kapasitas');
            $table->timestamps();
            $table->unsignedBigInteger('foto_ruang_id');
            $table->foreign('foto_ruang_id')->references('id')->on('foto_ruangs')->onDelete('cascade');
            $table->unsignedBigInteger('gedung_id');
            $table->foreign('gedung_id')->references('id')->on('gedungs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ruangs');
    }
};
