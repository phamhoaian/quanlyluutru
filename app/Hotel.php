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
        'name', 'address', 'phone', 'room', 'type', 'photo', 'delete_flg'
    ];

    public function user()
    {
    	return $this->hasMany('App\User');
    }

    public function owner()
    {
    	return $this->belongsTo('App\Owner');
    }
}
