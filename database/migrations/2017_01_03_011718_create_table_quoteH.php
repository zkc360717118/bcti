<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQuoteH extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotehotel', function (Blueprint $table) {
            $table->increments('qhid');
            $table->string('hotel1');
            $table->string('hotel2');
            $table->string('hotel3');
            $table->string('location');
//            $table->integer('star');
            $table->integer('qid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quotehotel');
    }
}
