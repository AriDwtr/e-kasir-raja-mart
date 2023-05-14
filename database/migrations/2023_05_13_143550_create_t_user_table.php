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
        Schema::create('t_user', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nm_user', 100);
            $table->string('email_user', 100);
            $table->string('gender', 1);
            $table->date('tgl_lahir')->nullable();
            $table->text('password');
            $table->text('ft_user')->nullable();
            $table->string('fitur1', 1);
            $table->string('fitur2', 1);
            $table->string('role', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_user');
    }
};
