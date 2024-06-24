<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('genre', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::create('producer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::create('lang_support', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::create('category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::create('region', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::create('service', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::create('platform', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::create('game', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
            $table->integer('date');
            $table->decimal('price');
            $table->float('discount');
            $table->string('url');
        });

        Schema::create('game_like', function (Blueprint $table) {
            $table->bigIncrements('id');
        });

        Schema::table('game', function (Blueprint $table) {
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('lang_support_id');
            $table->unsignedBigInteger('region_activate_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('platform_id');
            $table->unsignedBigInteger('producer_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('genre_id')->references('id')->on('genre');
            $table->foreign('lang_support_id')->references('id')->on('lang_support');
            $table->foreign('region_activate_id')->references('id')->on('region');
            $table->foreign('service_id')->references('id')->on('service');
            $table->foreign('platform_id')->references('id')->on('platform');
            $table->foreign('producer_id')->references('id')->on('producer');
            $table->foreign('category_id')->references('id')->on('category');
        });

        Schema::table('game_like', function(Blueprint $table){
            $table->unsignedBigInteger('Game_id');
            $table->unsignedBigInteger('User_id');

            $table->foreign('Game_id')->references('id')->on('game');
            $table->foreign('User_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genre');
        Schema::dropIfExists('game');
        Schema::dropIfExists('producer');
        Schema::dropIfExists('service');
        Schema::dropIfExists('platform');
        Schema::dropIfExists('lang_support');
        Schema::dropIfExists('region');
    }
};
