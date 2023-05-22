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
        Schema::create('t_barang', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('kd_brg')->unique();
            $table->string('nm_brg', 100);
            $table->bigInteger('stok');
            $table->string('ktg_brg', 100)->nullable();
            $table->string('hrg_brg', 20);
            $table->text('foto_brg')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_barang');
    }
};
