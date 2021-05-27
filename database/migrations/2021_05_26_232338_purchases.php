<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Purchases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigInteger('purchaseinvoiceno')->autoIncrement()->unique();
            $table->integer('productid');
            $table->foreign('productid')->references('productid')->on('products');
            $table->integer('supplierid');
            $table->foreign('supplierid')->references('supplierid')->on('suppliers');
            $table->string('purchasedate');
            $table->integer('purchaseqty');
            $table->integer('purchaseprice');
            $table->integer('nettotalamount');
            $table->integer('discount');
            $table->integer('totalamount');
            $table->timestamps();
        });
        DB::update("ALTER TABLE purchases AUTO_INCREMENT = 2021001;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
