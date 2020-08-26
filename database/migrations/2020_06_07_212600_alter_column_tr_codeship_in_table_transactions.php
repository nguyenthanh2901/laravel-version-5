<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnTrCodeshipInTableTransactions extends Migration
{
     public function up()
    {
        Schema::table('transactions',function (Blueprint $table){
            $table->string('tr_codeship')->nullable();
            $table->string('tr_shipper')->nullable();
            $table->string('tr_sta')->nullable();
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
            $table->dropColumn('tr_codeship','tr_shipper','tr_sta');
        });
    }
}
