<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');

            $table->string('title');

            $table->foreign('user_id')->references('id')->on('users'); //Relacionamos user_id, hacemos referencia al campo id de la tabla users y le decimos que el campo se encuentra en la tabla  'users'

            
            $table->timestamps();
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
