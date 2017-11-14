<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post__pictures', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('size');
            $table->text('extension');
            $table->text('ori_name');
            $table->integer('post_id');
            $table->foreign('post_id')
                ->references('posts')->on('id')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post__pictures');
    }
}
