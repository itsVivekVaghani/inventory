<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Profitloss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profitloss', function (Blueprint $table){
            $table->integer('profitid')->autoIncrement()->unique();
            $table->integer('productid');
            $table->foreign('productid')->references('productid')->on('products');
            $table->integer('saleinvoiceno');
            $table->foreign('saleinvoiceno')->references('saleinvoiceno')->on('sales');
            $table->string('saledate');
            $table->integer('saleqty');
            $table->integer('saleprice');
            $table->integer('purchaseprice')->nullable();
            $table->integer('totalsaleprice');
            $table->integer('totalpurchaseprice')->nullable();
            $table->integer('profitamount')->nullable();
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
        Schema::dropIfExists('profitloss');
    }
}
