<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transactionincomes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactionincomes', function (Blueprint $table) {
            $table->integer('incomeid')->autoIncrement()->unique();
            $table->integer('customerid');
            $table->foreign('customerid')->references('customerid')->on('newcustomers');
            $table->string('incomedate');
            $table->integer('ireceiveamount')->nullable();
            $table->integer('idueamount')->nullable();
            $table->integer('itotalamount')->nullable();
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
        Schema::dropIfExists('transactionincomes');
    }
}
