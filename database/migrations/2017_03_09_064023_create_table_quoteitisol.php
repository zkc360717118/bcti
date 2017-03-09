<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQuoteitisol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quoteitisolo', function (Blueprint $table) {
            //此表针对有行程报价时候的，储存现有的行程
        	$table->increments('id');
            $table->longText('content');
            $table->string('qid');//总报价id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quoteitisolo');
    }
}
