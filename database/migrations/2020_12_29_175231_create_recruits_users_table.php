<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruits_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('recruit_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            $table->foreign('recruit_id')->references('id')->on('recruits')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruits_users');
    }
}
