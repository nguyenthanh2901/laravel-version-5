<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnCodeInTableUsers extends Migration
{
    public function up()
    {
        Schema::table('users',function (Blueprint $table){
            $table->string('code')->nullable()->index();
            $table->timestamp('time_code')->nullable();
            $table->string('code_active')->nullable()->index();
            $table->timestamp('time_active')->nullable()->index();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function (Blueprint $table){
            $table->dropColumn(['time_code','code','code_active','time_active']);
        });
    }
}
