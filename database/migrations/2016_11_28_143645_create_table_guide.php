<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGuide extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guide', function (Blueprint $table) {
            $table->increments('gid');
            $table->string('city');
            $table->string('name');
            $table->string('telone');
            $table->string('teltwo');
            $table->integer('lan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('guide');
    }
}
