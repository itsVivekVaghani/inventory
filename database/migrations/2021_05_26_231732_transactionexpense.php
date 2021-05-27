<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transactionexpense extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactionexpense', function (Blueprint $table) {
            $table->integer('expenseid')->autoIncrement()->unique();
            $table->integer('supplierid');
            $table->foreign('supplierid')->references('supplierid')->on('suppliers');
            $table->string('expensedate');
            $table->integer('receiveamount')->nullable();
            $table->integer('dueamount')->nullable();
            $table->integer('totalamount')->nullable();
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
        Schema::dropIfExists('transactionexpense');
    }
}
