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
        'name', 'year_of_birth', 'address', 'id_card', 'sex'
    ];

    protected $table = 'customers';

    public function hotels()
    {
    	return $this->belongsToMany('App\Hotel');
    }
}
