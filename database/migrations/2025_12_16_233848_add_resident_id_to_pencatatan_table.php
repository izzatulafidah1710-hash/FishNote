<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pencatatan', function (Blueprint $table) {
            $table->foreignId('resident_id')->nullable()->after('user_id')->constrained('residents')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('pencatatan', function (Blueprint $table) {
            $table->dropForeign(['resident_id']);
            $table->dropColumn('resident_id');
        });
    }
};
