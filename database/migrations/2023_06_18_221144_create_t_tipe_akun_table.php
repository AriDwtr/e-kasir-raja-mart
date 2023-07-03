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
        Schema::create('t_tipe_akun', function (Blueprint $table) {
            $table->id();
            $table->string('tipe_akun', 20);
            $table->string('m_super_admin', 1)->default('1');
            $table->string('m_admin', 1)->default('1');
            $table->string('m_pegawai', 1)->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_tipe_akun');
    }
};
