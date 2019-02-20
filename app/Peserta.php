<?php

namespace App;

use Illuminate\Foundation\Auth\Peserta as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Authenticatable
{
    protected $table = 't_peserta';
    public $primaryKey = 'userid';
    public $incrementing = false;
    protected $fillable = [
        'userid', 
        'password',
        'level',
        'nama',
        'pangkalan'
    ];
    
    public function pengerjaan(){
        return $this->hasMany('App\Pengerjaan', 'userid');
    }
}
