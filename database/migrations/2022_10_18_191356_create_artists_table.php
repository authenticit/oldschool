<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->string('name', 255)->nullable();
            $table->string('email', 100)->unique()->nullable();
            $table->string('password')->nullable();
            $table->text('bio')->nullable();
            $table->text('details')->nullable();
            $table->text('theme')->nullable();
            $table->text('future_plan')->nullable();
            $table->string('image')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('facebook_url', 255)->nullable();
            $table->string('twitter_url', 255)->nullable();
            $table->string('linkedin_url', 255)->nullable();
            $table->string('art_work1')->nullable();
            $table->date('dob')->nullable();
            $table->string('nationality')->nullable();
            $table->string('notable_work')->nullable();
            $table->string('education')->nullable();
            $table->string('awards')->nullable();
            $table->string('gender')->nullable();
            $table->boolean('is_public')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('artists');
    }
}
