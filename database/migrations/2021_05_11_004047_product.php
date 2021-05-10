<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('productid');
            //$table->integer('product_id');
            //$table->integer('categoryid')->unsigned();
            //$table->foreign('categoryid')
                //->references('categoryid')->on('category')
                //->onDelete('cascade');
            $table->integer('categoryid');
            $table->foreign('categoryid')->references('categoryid')->on('category');
            $table->string('productname');
            $table->string('productdesc');
            $table->integer('productprice');
            $table->string('productimg');
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
        Schema::dropIfExists('product');
    }
}
