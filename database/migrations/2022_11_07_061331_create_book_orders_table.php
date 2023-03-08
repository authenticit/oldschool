<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->nullable();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('user_id');
            $table->string('method', 255)->nullable();
            $table->double('discount')->default(0);
            $table->double('pay_amount')->default(0);
            $table->enum('payment_status', ['Pending','Declined','Completed'])->default('pending');
            $table->enum('status', ['Pending','Declined','Completed'])->default('pending');
            $table->string('tx_id')->nullable();
            $table->string('bank_tx_id')->nullable();
            $table->integer('register_id')->default(0);
            $table->string('currency_sign', 100)->nullable();
            $table->string('currency_value', 10)->nullable();
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
        Schema::dropIfExists('book_orders');
    }
}
