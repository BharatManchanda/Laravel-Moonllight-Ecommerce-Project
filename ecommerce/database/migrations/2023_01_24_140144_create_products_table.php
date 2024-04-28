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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('title');
            $table->string('slug');
            $table->integer('brand');
            $table->string('model')->nullable();
            $table->string('image');
            $table->longText('short_desc')->nullable();
            $table->longText('desc')->nullable();
            $table->longText('keywords')->nullable();
            $table->longText('technical_specification')->nullable();
            $table->longText('uses')->nullable();
            $table->longText('warranty')->nullable();
            $table->integer('tax_id')->nullable();
            $table->integer('is_promo')->nullable();
            $table->integer('is_featured')->nullable();
            $table->integer('is_discounted')->nullable();
            $table->integer('is_tranding')->nullable();
            $table->integer('product_status')->nullable();
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
        Schema::dropIfExists('products');
    }
};
