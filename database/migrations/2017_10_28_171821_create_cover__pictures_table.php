<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoverPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cover__pictures', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
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
        Schema::dropIfExists('cover__pictures');
    }
}
