<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('galeris', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('kategori');
        $table->text('deskripsi');
        $table->string('pelukis');
        $table->string('gambar');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};
