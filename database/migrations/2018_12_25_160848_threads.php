<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Threads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function(Blueprint $table){
            
            $table->increments('threadid');
            $table->integer('postid');
            $table->integer('userid');
            $table->string('name');
            $table->string('role');
            $table->string('threadname');
            $table->string('threaddesc');
            $table->timestamp('mailcreated');
            

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
