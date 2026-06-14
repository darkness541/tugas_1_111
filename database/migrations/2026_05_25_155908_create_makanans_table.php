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
        Schema::create('makanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('harga');
            $table->text('deskripsi');
            
            // Foreign Key ke tabel kategori
            $table->foreignId('kategori_id')
                  ->constrained('kategoris')      // merujuk ke tabel kategoris
                  ->onDelete('cascade');          // otomatis hapus makanan kalau kategorinya dihapus
            
            $table->integer('stok')->default(0);
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('makanans');
    }
};