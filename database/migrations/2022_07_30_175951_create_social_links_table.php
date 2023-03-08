<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('facebook');
            $table->string('google_plus');
            $table->string('twitter');
            $table->string('linkedin');
            $table->string('dribbble');
            $table->boolean('f_status')->default(1);
            $table->boolean('g_status')->default(1);
            $table->boolean('t_status')->default(1);
            $table->boolean('l_status')->default(1);
            $table->boolean('d_status')->default(1);
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
        Schema::dropIfExists('social_links');
    }
}
