<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToQuote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quote', function (Blueprint $table) {
            $table->unsignedTinyInteger('foc');
            $table->string('ss');
            $table->float('exrate')->comment('汇率exchange rate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quote', function (Blueprint $table) {
            $table->dropColumn('foc');
            $table->dropColumn('ss');
            $table->dropColumn('exrate');
        });
    }
}
