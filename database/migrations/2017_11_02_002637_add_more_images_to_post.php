<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreImagesToPost extends Migration
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
            $table->string('cover_image2');
            $table->string('cover_image3');
            $table->string('cover_image4');
            $table->string('cover_image5');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

            Schema::table('posts', function($table){
            $table->dropColumn('cover_image2');
            $table->dropColumn('cover_image3');
            $table->dropColumn('cover_image4');
            $table->dropColumn('cover_image5');
        });
    }
}
