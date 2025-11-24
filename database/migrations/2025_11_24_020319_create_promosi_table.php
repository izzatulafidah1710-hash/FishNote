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
        Schema::create('promosi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID peternak
            $table->string('judul_promosi');
            $table->string('jenis_ikan');
            $table->text('deskripsi');
            $table->decimal('harga', 15, 2); // harga per kg atau per ekor
            $table->enum('satuan', ['Kg', 'Ekor'])->default('Kg');
            $table->integer('stok_tersedia'); // jumlah stok
            $table->string('lokasi')->nullable(); // lokasi peternak
            $table->string('kontak'); // nomor HP/WhatsApp
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->enum('status', ['Aktif', 'Tidak Aktif', 'Habis'])->default('Aktif');
            $table->string('foto')->nullable(); // foto produk
            $table->integer('views')->default(0); // jumlah dilihat
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promosi');
    }
};
