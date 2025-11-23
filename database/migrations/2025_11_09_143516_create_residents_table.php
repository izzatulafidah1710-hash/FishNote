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
            $table->string('name'); // Nama peternak
            $table->string('email')->unique(); // Email login
            $table->string('phone')->nullable(); // Nomor telepon
            $table->string('address')->nullable(); // Alamat tempat budidaya
            $table->string('farm_location')->nullable(); // Lokasi kolam / tambak
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
 