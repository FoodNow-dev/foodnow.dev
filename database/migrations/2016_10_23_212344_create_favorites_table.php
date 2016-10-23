<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            
            $table->increments('id');

            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('rest_id');
            $table->foreign('rest_id')->references('id')->on('restaurants');

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
        Schema::drop('favorites')
    }
}
