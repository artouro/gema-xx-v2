<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 't_users';
    public $primaryKey = 'email';
    public $incrementing = false;
    protected $fillable = [
        'email', 
        'password',
        'level',
        'nama',
        'pangkalan',
        'lkbb',
        'form_lkbb',
        'telp'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function payment(){
        return $this->hasMany('App\Pembayaran', 'email', 'email');
    }
}
