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
        Schema::create('reservasi_alats', function (Blueprint $table) {
            $table->id();
            $table->string('kegiatan');
            $table->string('alasan')->nullable();
            $table->string('surat')->nullable();
            $table->string('penanggung_jawab');
            $table->string('status')->nullable();
            $table->string('no_reservasi', 191)->unique();
            $table->string('no_telepon');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->unsignedBigInteger('alat_id');
            $table->foreign('alat_id')->references('id')->on('alats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservasi_alats');
    }
};
