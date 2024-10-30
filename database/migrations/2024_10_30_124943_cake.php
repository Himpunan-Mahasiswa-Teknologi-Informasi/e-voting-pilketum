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
        Schema::create('cakes', function (Blueprint $table) {
            $table->id('id_cake');
            $table->unsignedBigInteger('id_paslon')->index;
            $table->string('nama');
            $table->string('foto');
            $table->text('deskripsi');
            $table->string('prodi');
            $table->string('kelas');
            $table->timestamps();

            $table->foreign('id_paslon')->references('id_level')->on('paslon');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
