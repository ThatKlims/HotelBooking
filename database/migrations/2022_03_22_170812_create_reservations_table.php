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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id')->unsigned()->index();
            $table->Integer('Room_id')->unsigned()->index();
            $table->string("ClientName");
            $table->string("ClientSurname");
            $table->string("ClientPhoneNumber");
            $table->integer("TotalPrice");
            $table->dateTime('reservation_starts');
            $table->dateTime('reservation_ends');
            $table->boolean("IsCompleted");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('Room_id')->references('id')->on('rooms')->onDelete('cascade');
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
};
