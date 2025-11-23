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
        Schema::create('data_panen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID peternak
            $table->date('tanggal_panen');
            $table->string('jenis_ikan');
            $table->string('kolam');
            $table->integer('jumlah_ikan'); // dalam ekor
            $table->decimal('berat_total', 10, 2); // dalam kg
            $table->decimal('berat_rata_rata', 10, 2)->nullable(); // dalam kg per ekor
            $table->decimal('harga_per_kg', 15, 2); // harga jual per kg
            $table->decimal('total_pendapatan', 15, 2); // total hasil penjualan
            $table->string('pembeli')->nullable(); // nama pembeli
            $table->text('keterangan')->nullable();
            $table->enum('status', ['Sudah Terjual', 'Belum Terjual', 'Sebagian Terjual'])->default('Belum Terjual');
            $table->string('foto')->nullable(); // foto panen
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_panen');
    }
};
