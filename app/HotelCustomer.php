<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelCustomer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hotel_id', 'customer_id', 'room_number', 'check_in', 'check_out'
    ];

    protected $table = 'hotel_customer_map';
}
