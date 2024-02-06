<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brews', function (Blueprint $table) {
            $table->id();
            $table->integer('external_id')->unique();
            $table->string('name')->index('name');
            $table->string('tagline');
            $table->text('description');
            $table->string('since');
            $table->string('image_url');
            $table->string('volume');
            $table->float('abv');
            $table->float('ibu');
            $table->float('ph');
            $table->json('ingredients');
            $table->json('food_pairing');
            $table->text('brewers_tips');
            $table->json('additional_data');
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
        Schema::dropIfExists('brews');
    }
};
