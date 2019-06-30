<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->date("checkin")->nullable();
            $table->date("checkout")->nullable();
            $table->integer("numNights");
            $table->string("adult");
            $table->string("child")->nullable();
            $table->string("numRooms");
            $table->string("roomType");
            $table->decimal("amount");
            $table->string("reservationStatus")->nullable();
            $table->string("paymentStatus")->nullable();
            $table->string("cardType")->nullable();
            $table->string("CCNum")->nullable();
            $table->date("expDate")->nullable();
            $table->string("cvc")->nullable();
            $table->longText("notes")->nullable();
            $table->string("reference")->nullable();


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
        Schema::dropIfExists('reservations');
    }
}
