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
    public $primaryKey = 'userid';
    public $incrementing = false;
    protected $fillable = [
        'userid', 
        'password',
        'gender',
        'level',
        'nama',
        'pangkalan',
        'email_pinru', 
        'email_pembina', 
        'telp_pinru', 
        'telp_pembina',
        'no_peserta',
        'aktif',
        'bukti_pembayaran'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
