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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email_id");
            $table->string("mobile");
            $table->string("password");
            $table->string("address")->nullable();
            $table->string("locality")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("zip")->nullable();
            $table->string("company")->nullable();
            $table->string("gstin")->nullable();
            $table->integer("customer_status")->default(1);
            $table->integer("is_verify")->default(0);
            $table->integer("is_forget_password")->default(0);
            $table->integer("is_rand");
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
        Schema::dropIfExists('customers');
    }
};
