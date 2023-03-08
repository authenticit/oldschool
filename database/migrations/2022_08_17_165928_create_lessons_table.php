<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('section_id');
            $table->text('type')->nullable();
            $table->text('title')->nullable();
            $table->text('details')->nullable();
            $table->string('file')->nullable();
            $table->string('url')->nullable();
            $table->time('duration')->nullable();
            $table->text('iframe_code')->nullable();
            $table->string('video_file')->nullable();
            $table->string('pos')->nullable();
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
        Schema::dropIfExists('lessons');
    }
}
