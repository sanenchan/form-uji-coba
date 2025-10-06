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
        Schema::create('detail_lahan_rotary', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lahan');
            $table->unsignedBigInteger('id_produksi');
            $table->integer('jumlah_batang');
            $table->timestamps();

            $table->foreign('id_lahan')
                ->references('id_lahan')
                ->on('lahans')
                ->onDelete('restrict');
            $table->foreign('id_produksi')
                ->references('id')
                ->on('produksi_rotary')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_lahan_rotary');
    }
};
