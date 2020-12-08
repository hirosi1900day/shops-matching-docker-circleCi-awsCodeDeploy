<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShopsGallery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallerys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shops_id');
            $table->string('image_location');
            $table->timestamps();
            
            $table->foreign('shops_id')->references('id')->on('shops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallerys');
    }
}
