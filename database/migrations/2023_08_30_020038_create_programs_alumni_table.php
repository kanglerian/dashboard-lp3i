<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsAlumniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs_alumni', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('image');
            $table->string('name');
            $table->string('school');
            $table->string('profession');
            $table->string('work');
            $table->text('quote');
            $table->year('year');
            $table->string('career');
            $table->boolean('testimoni');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs_alumni');
    }
}
