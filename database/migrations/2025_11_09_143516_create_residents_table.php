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
        Schema::create('residents', function (Blueprint $table) {
            $table->id(); // Primary Key
            
            // TAMBAHKAN INI: Foreign Key ke tabel users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            $table->string('name'); // Nama peternak
            $table->string('email')->unique(); // Email (sama dengan di users)
            $table->string('phone')->nullable(); // Nomor telepon
            $table->text('address')->nullable(); // Alamat tempat budidaya
            $table->string('farm_location')->nullable(); // Lokasi kolam / tambak
            
            // OPSIONAL: Tambahan field yang berguna
            $table->string('jenis_usaha')->nullable(); // Jenis usaha (budidaya/pembenihan/dll)
            $table->decimal('luas_lahan', 10, 2)->nullable(); // Luas lahan (m2)
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif'); // Status peternak
            
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};