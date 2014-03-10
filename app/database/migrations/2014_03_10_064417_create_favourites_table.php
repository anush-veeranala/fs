<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavouritesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('favourites', function($table)
        {
            $table
                ->increments('id');
            $table
                ->integer('user_id')
                ->unsigned() // recommended for foreign key, in doc
                ->foreign()
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); // on delete of parent, delete this record too
            $table
                ->integer('message_id')
                ->unsigned() // recommended for foreign key, in doc
                ->index() // index is not added automaticaly for foreign key
                ->foreign()
                ->references('id')
                ->on('messages')
                ->onDelete('cascade'); // on delete of parent, delete this record too
            $table
                ->timestamps();
            $table
                ->unique('user_id', 'message_id');
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
        Schema::drop('favourites');
        //
    }

}
