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
        Schema::create('detail_pegawai_rotary', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produksi');
            $table->unsignedBigInteger('id_pegawai');
            $table->integer('id_role');
            $table->time('jam_masuk')->nullable();
            $table->time('jam_pulang')->nullable();
            $table->timestamps();
            $table->foreign('id_produksi')
                ->references('id')
                ->on('produksi_rotary')
                ->onDelete('cascade');
            $table->foreign('id_pegawai')
                ->references('id_pegawai')
                ->on('pegawais')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pegawai_rotary');
    }
};
