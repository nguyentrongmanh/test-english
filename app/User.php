<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', "company", "age", "phone", "address", 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
	];
	public function getFormatCreated() {
		return Carbon::createFromFormat("Y-m-d H:i:s", $this->created_at)->format("Y-m-d");
	}

	public function tests() {
		return $this->hasMany('App\Test');
	}

    public function classes() {
        return $this->belongsToMany('App\Classes', 'class_registers', 'user_id');
    }
}