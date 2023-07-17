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
        Schema::create('rooms__room_services', function (Blueprint $table) {
            $table->Integer('Room_id')->unsigned()->index();
            $table->Integer('RoomService_id')->unsigned()->index();
            $table->foreign('Room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('RoomService_id')->references('id')->on('room_services')->onDelete('cascade');
            $table->timestamps();
            $table->integer("service usage amount")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms__room_services');
    }
};
