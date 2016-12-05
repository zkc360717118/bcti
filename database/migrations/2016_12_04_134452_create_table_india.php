<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIndia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('india', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cid')->unsigned();
            $table->string('pname')->index();
            $table->string('tel1')->index()->default(0);
            $table->string('tel2')->index()->default(0);
            $table->string('title');
            $table->text('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('india');
    }
}
