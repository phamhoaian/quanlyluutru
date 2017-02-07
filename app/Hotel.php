<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'phone', 'room', 'type', 'photo', 'delete_flg', 'owner_id'
    ];

    public function user()
    {
    	return $this->hasOne('App\User');
    }

    public function owner()
    {
    	return $this->belongsTo('App\Owner');
    }

    public function customers()
    {
        return $this->belongsToMany('App\Customer');
    }
}
