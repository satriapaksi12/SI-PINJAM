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
        Schema::create('alats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_alat');
            $table->string('no_inventaris', 191)->unique();
            $table->timestamps();
            $table->unsignedBigInteger('foto_alat_id');
            $table->foreign('foto_alat_id')->references('id')->on('foto_alats')->onDelete('cascade');
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
        Schema::dropIfExists('alats');
    }
};
