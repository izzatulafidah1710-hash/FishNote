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
        Schema::create('pencatatan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID peternak
            $table->date('tanggal');
            $table->string('jenis_kegiatan'); // pemberian pakan, pengecekan kualitas air, panen, dll
            $table->text('keterangan')->nullable();
            $table->decimal('jumlah_pakan', 10, 2)->nullable(); // dalam kg
            $table->decimal('berat_ikan', 10, 2)->nullable(); // dalam kg
            $table->integer('jumlah_ikan')->nullable();
            $table->decimal('suhu_air', 5, 2)->nullable(); // dalam celcius
            $table->decimal('ph_air', 4, 2)->nullable();
            $table->decimal('oksigen', 5, 2)->nullable(); // dalam mg/L
            $table->string('kondisi_ikan')->nullable(); // sehat, sakit, dll
            $table->decimal('biaya', 15, 2)->nullable(); // biaya operasional
            $table->string('foto')->nullable(); // path foto dokumentasi
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencatatan');
    }
};
