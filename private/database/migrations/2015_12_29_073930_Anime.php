<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Anime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_anime',function($table){
            $table->increments('id');
            $table->string('category',50);
            $table->timestamps();
        });

        Schema::create('anime',function($table){
            $table->increments('id');
            $table->string('category');
            $table->string('title',100);
            $table->string('cover');
            $table->text('description');
            $table->string('studio');
            $table->string('rating');
            $table->string('season');
            $table->string('credit');
            $table->timestamps();
        });

        Schema::create('post_anime',function($table){
            $table->increments('id');
            $table->integer('id_anime')->unsigned();;
            $table->string('title',100);
            $table->text('description');
            $table->string('screenshot1');
            $table->string('screenshot2');
            $table->string('screenshot3');
            $table->timestamps();
            $table->foreign('id_anime')->references('id')->on('anime')->onDelete('cascade');
        });

        Schema::create('download_anime',function($table){
            $table->increments('id');
            $table->integer('id_post')->unsigned();;
            $table->string('title',50);
            $table->string('r480p');
            $table->string('r720p');
            $table->string('blueray');
            $table->string('direct_link');
            $table->timestamps();
            $table->foreign('id_post')->references('id')->on('post_anime')->onDelete('cascade');
        });

       /* Schema::create('image_post',function($table){
            $table->increments('id');
            $table->integer('id_post')->unsigned();
            $table->string('path');
            $table->foreign('id_post')->references('id')->on('post_anime')->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('anime');
        Schema::drop('category_anime');
        Schema::drop('post_anime');
        Schema::drop('download_anime');
        Schema::drop('image_post');

    }
}
