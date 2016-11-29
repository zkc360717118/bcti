<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFood extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->string('resname')->index();
            $table->string('telone')->index();
            $table->string('personone');
            $table->string('teltwo');
            $table->string('persontwo');
            $table->string('menuid');//1,23,33,112  这种类型的
            $table->string('groupm');//group morning
            $table->string('sm');//single morning
            $table->string('groupn');//group noon
            $table->string('sn');//singgle noon
            $table->string('groupd');//group dinner
            $table->string('sd'); //single dinner
            $table->string('city'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
