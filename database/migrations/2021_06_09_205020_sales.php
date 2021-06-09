<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigInteger('saleinvoiceno')->autoIncrement()->unique();
            $table->integer('productid');
            $table->foreign('productid')->references('productid')->on('products');
            $table->integer('customerid');
            $table->foreign('customerid')->references('customerid')->on('newcustomers');
            $table->string('saledate');
            $table->integer('saleqty');
            $table->integer('saleprice');
            $table->integer('nettotalamount');
            $table->integer('discount');
            $table->integer('totalamount');
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
        Schema::dropIfExists('sales');
    }
}
