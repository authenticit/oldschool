<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentGatewaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->id();
            $table->string('sub_title', 150)->nullable();
            $table->string('title', 150)->nullable();
            $table->text('details')->nullable();
            $table->string('name', 100)->nullable();
            $table->enum('type', ['manual','automatic'])->default('manual');
            $table->text('information')->nullable();
            $table->string('keyword')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('register_id')->default(0);
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
        Schema::dropIfExists('payment_gateways');
    }
}
