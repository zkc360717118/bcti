<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHotels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('hid');
            $table->string('city');
            $table->string('hname')->unique()->index();
            $table->string('star');
            $table->string('tel')->default('');
            $table->string('note');
            $table->string('jan');
            $table->string('feb');
            $table->string('mar');
            $table->string('apr');
            $table->string('may');
            $table->string('june');
            $table->string('july');
            $table->string('aug');
            $table->string('sep');
            $table->string('oct');
            $table->string('nov');
            $table->string('dec');

//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hotels');
    }
}
