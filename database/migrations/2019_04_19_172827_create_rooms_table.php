<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('roomType')->nullable(); // inlcude ->nullable() for null vlaues from https://laravel.com/docs/4.2/schema
            $table->string('numOfBed'); // if you change this to integer you need to make a chane first then go to sheel cd htdoc cd FYP and run php artisan migrate:refresh --seed
            $table->string('roomStatus');
            $table->string('numGuest');
            $table->string('roomNum');
            $table->double('price');
            $table->longText("comments")->nullable();
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
        Schema::dropIfExists('rooms');
    }
}
