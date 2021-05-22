<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Stocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->integer('stockid')->autoIncrement()->unique();
            $table->integer('productid');
            $table->foreign('productid')->references('productid')->on('products');
            $table->integer('inquantity')->nullable();
            $table->integer('outquantity')->nullable();
            $table->integer('finalstock')->nullable();
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
        Schema::dropIfExists('stocks');
    }
}
