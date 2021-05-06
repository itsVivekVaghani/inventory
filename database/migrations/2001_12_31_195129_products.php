<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('productid');
            //$table->integer('product_id');
            $table->string('productname');
            $table->string('productdesc');
            $table->integer('productprice');
            $table->timestamps();
        });
        
        DB::update("ALTER TABLE products AUTO_INCREMENT=1000;");
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
}
