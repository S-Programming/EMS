<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckincheckouthistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkincheckouthistory', function (Blueprint $table) {
            $table->id();
            $table->dateTime('checkin');
            $table->dateTime('checkout');
            $table->string('description');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
           
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
        Schema::dropIfExists('checkincheckouthistory');
    }
}
