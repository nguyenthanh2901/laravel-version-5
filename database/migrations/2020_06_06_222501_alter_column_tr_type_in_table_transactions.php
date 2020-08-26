<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnTrTypeInTableTransactions extends Migration
{
     public function up()
    {
        Schema::table('transactions',function (Blueprint $table){
            $table->string('tr_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions',function (Blueprint $table){
            $table->dropColumn('tr_type');
        });
    }
}
