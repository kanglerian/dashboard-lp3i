<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookChapterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_chapter', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->string('title')->nullable();
            $table->string('pamedal')->nullable();
            $table->year('year');
            $table->string('isbn')->nullable();
            $table->string('hki')->nullable();
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
        Schema::dropIfExists('book_chapter');
    }
}
