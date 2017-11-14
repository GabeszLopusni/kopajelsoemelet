<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile__pictures', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('path');
            $table->integer('size');
            $table->text('extension');
            $table->text('ori_name');
            $table->integer('user_id');
            $table->foreign('user_id')
                ->references('users')->on('id')
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
        Schema::dropIfExists('profile__pictures');
    }
}
