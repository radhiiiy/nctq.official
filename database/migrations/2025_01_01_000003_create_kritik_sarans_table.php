<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kritik_sarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('judul');
            $table->text('deskripsi');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kritik_sarans');
    }
};
