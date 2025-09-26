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
        //
         Schema::create('proyek', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->string('gambar', 255);
            $table->string('tech', 255);
            $table->text('deskripsi');
            $table->string('link', 255)->nullable();
            $table->timestamps();
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
