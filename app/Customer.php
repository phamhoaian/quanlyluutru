<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'year_of_birth', 'address', 'id_card', 'sex', 'nationality', 'passport', 'passport_info', 'date_entry', 'port_entry', 'purpose_entry', 'permitted_start', 'permitted_end', 'foreign_flg'
    ];

    protected $table = 'customers';

    public function hotels()
    {
    	return $this->belongsToMany('App\Hotel');
    }

    public function hotel_customer()
    {
        return $this->hasOne('App\HotelCustomer');
    }
}
