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
        Schema::create('reservasi_ruangs', function (Blueprint $table) {
            $table->id();
            $table->string('kegiatan');
            $table->string('alasan')->nullable();
            $table->string('surat')->nullable();
            $table->string('kelas')->nullable();
            $table->string('penanggung_jawab');
            $table->string('status')->nullable();
            $table->string('no_reservasi', 191)->unique();
            $table->string('no_telepon');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('ruang_id');
            $table->foreign('ruang_id')->references('id')->on('ruangs')->onDelete('cascade');
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->unsignedBigInteger('jenis_acara_id');
            $table->foreign('jenis_acara_id')->references('id')->on('jenis_acaras')->onDelete('cascade');
            $table->unsignedBigInteger('periode_id');
            $table->foreign('periode_id')->references('id')->on('periodes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservasi_ruangs');
    }
};
