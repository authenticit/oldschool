<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('contact_email')->nullable();
            $table->string('street')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('site')->nullable();
            $table->string('hero_bg', 255)->nullable();
            $table->string('instructor_img')->nullable();
            $table->string('faq_image')->nullable();
            $table->string('faq_link')->nullable();
            $table->string('newsletter_image')->nullable();
            $table->string('newsletter_title')->nullable();
            $table->text('newsletter_text')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_text')->nullable();
            $table->string('hero_btn_text')->nullable();
            $table->string('hero_btn_url')->nullable();
            $table->integer('register_id')->default(0);
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
        Schema::dropIfExists('page_settings');
    }
}
