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
        // Tambah kolom resident_id ke tabel promosi
        if (!Schema::hasColumn('promosi', 'resident_id')) {
            Schema::table('promosi', function (Blueprint $table) {
                $table->unsignedBigInteger('resident_id')->nullable()->after('user_id');
                $table->foreign('resident_id')
                      ->references('id')
                      ->on('residents')
                      ->onDelete('cascade');
            });
        }

        // Update data existing: Set resident_id berdasarkan user_id
        DB::statement('
            UPDATE promosi p
            INNER JOIN residents r ON r.user_id = p.user_id
            SET p.resident_id = r.id
            WHERE p.resident_id IS NULL
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('promosi', function (Blueprint $table) {
            $table->dropForeign(['resident_id']);
            $table->dropColumn('resident_id');
        });
    }
};