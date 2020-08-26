<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnProContentAndProTitleCeoInTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products',function (Blueprint $table)
        {
           $table->string('pro_title_ceo')->nullable();
            $table->longText('pro_content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products',function (Blueprint $table)
        {
            $table->dropColumn('pro_title_ceo');
            $table->dropColumn('pro_content');
        });
    }
}
