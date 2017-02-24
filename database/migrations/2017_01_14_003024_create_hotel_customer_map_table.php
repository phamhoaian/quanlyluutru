<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelCustomerMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_customer_map', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id');
            $table->integer('customer_id');
            $table->char('room_number', 4);
            $table->dateTime('check_in');
            $table->dateTime('check_out')->nullable();
            $table->timestamps();
            $table->primary('id');
            $table->index('hotel_id');
            $table->index('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hotel_customer_map');
    }
}
