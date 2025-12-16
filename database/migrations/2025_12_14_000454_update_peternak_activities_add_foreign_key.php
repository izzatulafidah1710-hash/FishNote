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
        // Tambah foreign key constraint jika belum ada
        if (!Schema::hasColumn('peternak_activities', 'peternak_id')) {
            Schema::table('peternak_activities', function (Blueprint $table) {
                $table->foreign('peternak_id')
                      ->references('id')
                      ->on('residents')
                      ->onDelete('cascade');
            });
        }

        // Tambah index untuk performa query
        Schema::table('peternak_activities', function (Blueprint $table) {
            if (!Schema::hasColumn('peternak_activities', 'activity_type')) {
                $table->index('activity_type');
            }
            if (!Schema::hasColumn('peternak_activities', 'created_at')) {
                $table->index('created_at');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peternak_activities', function (Blueprint $table) {
            $table->dropForeign(['peternak_id']);
            $table->dropIndex(['activity_type']);
            $table->dropIndex(['created_at']);
        });
    }
};