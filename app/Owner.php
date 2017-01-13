<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hotel_id', 'name', 'birthday', 'id_card', 'address', 'business_cert', 'security'
    ];

    public function hotel()
    {
    	return $this->hasMany('App\Hotel');
    }
}
