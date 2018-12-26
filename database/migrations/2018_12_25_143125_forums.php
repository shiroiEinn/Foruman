<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Forums extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forums', function(Blueprint $table){
            $table->increments('postid');
            $table->integer('userid');
            $table->string('postname');
            $table->string('category');
            $table->string('postdesc');
            $table->string('poststatus');
            $table->timestamp('forumcreated');

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
