<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->String('name');
            $table->String('email');
            $table->String('mobile');
            $table->String('address');
            $table->String('locality');
            $table->String('city');
            $table->String('state');
            $table->String('zip');
            $table->String('coupon_code')->nullable();
            $table->integer('coupon_value')->nullable();
            $table->integer('orders_status');
            $table->enum('payment_type',["COD","Gateway"]);
            $table->String('payment_status');
            $table->String('payment_id');
            $table->String('transaction_id')->nullable();
            $table->integer('total_amount');
            $table->string('tracking')->default("Your Order is Confirmed");
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
        Schema::dropIfExists('orders');
    }
};
