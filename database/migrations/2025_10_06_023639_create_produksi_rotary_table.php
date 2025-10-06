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
        Schema::create('produksi_rotary', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mesin');
            $table->date('tgl_produksi');
            $table->text('kendala')->nullable();
            $table->timestamps();
            $table->foreign('id_mesin')
                ->references('id_mesin')
                ->on('mesins')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produksi_rotary');
    }
};
