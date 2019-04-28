<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('comms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('body');
            $table->integer('commentable_id')->unsigned();
            $table->string('commentable_type');
            $table->timestamp('created');
            $table->timestamp('updated');
        });
        Schema::table('comms', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
        // Schema::table('comms', function (Blueprint $table) {
        //     $table->unsignedBigInteger('parent_id');
        //     $table->foreign('parent_id')->references('id')->on('posts');
        // });

    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('comms');
    }
}
