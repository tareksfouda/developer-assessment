<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMorePostsFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('posts', function($table){
        $table->string('year');
        $table->string('make');
        $table->string('model');
        $table->integer('price');
        $table->string('keyword');
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
        Schema::table('users', function($table){
          $table->dropColumn('year');
          $table->dropColumn('make');
          $table->dropColumn('model');
          $table->dropColumn('price');
          $table->dropColumn('keyword');
        });
    }
}
