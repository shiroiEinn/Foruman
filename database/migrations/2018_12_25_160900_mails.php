<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function(Blueprint $table){
            $table->increments('mailid');
            $table->integer('userid');
            $table->string('role');
            $table->string('msgsender');
            $table->string('msgcontent');
            $table->timestamp('mailsent');

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
