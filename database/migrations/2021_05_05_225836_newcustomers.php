<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Newcustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newcustomers', function (Blueprint $table) {
            $table->bigIncrements('customerid');
            $table->string('customername');
            $table->string('customermob');
            $table->string('customeradd');
            $table->integer('customerbal');
            $table->string('customeremail');
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
        Schema::dropIfExists('newcustomers');
    }
}
