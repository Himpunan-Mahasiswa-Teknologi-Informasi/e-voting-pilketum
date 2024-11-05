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
        Schema::create('cake', function (Blueprint $table) {
            $table->id('id_cake');
            $table->unsignedBigInteger('id_paslon')->index;
            $table->string('nama');
            $table->string('foto');
            $table->text('deskripsi');
            $table->string('prodi');
            $table->string('kelas');
            $table->timestamps();

            $table->foreign('id_paslon')->references('id_paslon')->on('paslon');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cake');
    }
};
