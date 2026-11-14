<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('kode');          // WEB-01, PHP-01, dst
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->integer('harga');
            $table->integer('kapasitas');
            $table->date('tanggal');
            $table->string('status')->default('draft'); // open / draft
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};