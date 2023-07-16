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
        Schema::create('t_transaksi_in', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kd_brg');
            $table->string('nm_brg', 100);
            $table->string('ktg_brg', 5)->nullable();
            $table->bigInteger('stok_in');
            $table->string('hrg_brg_beli', 20);
            $table->string('hrg_brg_jual', 20);
            $table->date('expired_brg')->nullable();
            $table->string('action', 10);
            $table->text('id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_transaksi_in');
    }
};
