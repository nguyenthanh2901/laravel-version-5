<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnColorInTableProducts extends Migration
{
    public function up()
    {
        Schema::table('products',function (Blueprint $table){
            $table->string('pro_color')->nullable()->index();
            
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products',function (Blueprint $table){
            $table->dropColumn(['pro_color']);
        });
    }
}
