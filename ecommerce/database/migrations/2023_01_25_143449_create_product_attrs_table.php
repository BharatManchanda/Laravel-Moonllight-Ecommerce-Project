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
        Schema::create('product_attrs', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('sku')->nullable();
            $table->integer('mrp');
            $table->integer('price');
            $table->integer('size')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('color_id')->nullable();
            $table->string('attr_img')->nullable();
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
        Schema::dropIfExists('product_attrs');
    }
};
