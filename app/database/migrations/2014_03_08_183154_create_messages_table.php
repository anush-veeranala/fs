<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function($table)
        {
            $table
                ->increments('id');
            $table
                ->string('message', 200);
            $table
                ->integer('user_id')
                ->index()
                ->foreign()
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('messages');
        //
    }

}
