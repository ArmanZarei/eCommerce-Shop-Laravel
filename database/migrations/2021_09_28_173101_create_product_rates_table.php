<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_rates', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->tinyInteger('rate');

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
        Schema::dropIfExists('product_rates');
    }
}
