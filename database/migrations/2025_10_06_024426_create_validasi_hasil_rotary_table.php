<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('validasi_hasil_rotary', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_hasil_palet');
            $table->unsignedBigInteger('id_pegawai');
            $table->integer('id_role');
            $table->timestamps();
            $table->foreign('id_hasil_palet')
                ->references('id')
                ->on('detail_hasil_palet_rotary')
                ->onDelete('cascade');
            $table->foreign('id_pegawai')
                ->references('id_pegawai')
                ->on('pegawais')
                ->onDelete('cascade');
            // $table->foreign('id_role')
            // ->references('id')
            // ->on('roles')
            // ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validasi_hasil_rotary');
    }
};
