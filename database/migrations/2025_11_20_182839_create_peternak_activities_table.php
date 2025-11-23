<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeternakActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('peternak_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('peternak_id');
            $table->string('activity_type');
            $table->text('description')->nullable();
            $table->string('related_module')->nullable();
            $table->unsignedBigInteger('related_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('peternak_activities');
    }
}
