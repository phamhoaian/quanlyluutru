<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'note', 'photo', 'role_id', 'hotel_id', 'active_key', 'active_flg', 'delete_flg', 'official_flg'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return ($this->role_id != 1);
    }

    public function isMember()
    {
        return ($this->role_id == 1);
    }

    public function isOfficial()
    {
        return ($this->official_flg == 1);
    }

    public function isActive()
    {
        return ($this->active_flg == 1);
    }

    public function isOwner()
    {
        return ($this->hotel_id != '');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}
