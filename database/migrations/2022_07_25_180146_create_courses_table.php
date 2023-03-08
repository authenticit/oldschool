<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->default(0);
            $table->unsignedBigInteger('admin_id')->default(0);
            $table->unsignedBigInteger('instructor_id')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->unsignedBigInteger('language_id')->default(0);
            $table->unsignedBigInteger('category_id')->default(0);
            $table->tinyInteger('is_top')->default(0);
            $table->tinyInteger('is_free')->default(0);
            $table->string('title', 255);
            $table->string('slug', 255)->nullable();
            $table->double('price')->default(0);
            $table->unsignedBigInteger('time')->nullable();
            $table->unsignedBigInteger('discount_price')->default(0);
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->enum('level', ['Beginner','Intermediate','Advanced'])->default('Beginner');
            $table->text('requirements')->nullable();
            $table->text('outcomes')->nullable();
            $table->enum('course_overview_type', ['Youtube','Vimeo','Html5'])->default('Youtube');
            $table->text('course_overview_url')->nullable();
            $table->string('photo')->nullable();
            $table->double('percentage')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('include_icon')->nullable();
            $table->text('include_text')->nullable();
            $table->unsignedBigInteger('register_id')->default(0);
            $table->tinyInteger('future_update')->default(0);
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
        Schema::dropIfExists('courses');
    }
}
