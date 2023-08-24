<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLuaranUppmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luaran_uppm', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('writter')->nullable();
            $table->string('type');
            $table->string('publication')->nullable();
            $table->string('indexjurnal')->nullable();
            $table->year('year');
            $table->text('link');
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
        Schema::dropIfExists('luaran_uppm');
    }
}
