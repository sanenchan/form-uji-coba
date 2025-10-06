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
        Schema::create('detail_hasil_palet_rotary', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produksi');
            $table->timestamp('timestamp_laporan');
            $table->unsignedBigInteger('id_ukuran');
            $table->integer('id_kw');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('id_produksi')
                ->references('id')
                ->on('produksi_rotary')
                ->onDelete('cascade');
            $table->foreign('id_ukuran')
                ->references('id_ukuran')
                ->on('ukurans')
                ->onDelete('cascade');
            // $table->foreign('id_kw')
            //     ->references('id')
            //     ->on('kw')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_hasil_palet_rotary');
    }
};
