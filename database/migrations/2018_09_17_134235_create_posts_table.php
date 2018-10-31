<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) { //hier voeg je je tabelcontents toe
            $table->increments('id');
            $table->string('title');
            $table->mediumText('body');
            $table->timestamps();
            $table->string('cover_image');
            $table->integer('user_id');
            $table->tinyInteger('status')->default('1');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
