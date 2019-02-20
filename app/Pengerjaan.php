<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengerjaan extends Model
{
    protected $table = 't_pengerjaan';
    public $primaryKey = 'id_pengerjaan';
    protected $fillable = [
        'userid',
        'id_matalomba',
        'waktu_pengerjaan',
        'nilai'
    ];

    public function matalomba(){
        return $this->belongsTo('App\Matalomba', 'id_matalomba');
    }
    
    public function user(){
        return $this->belongsTo('App\Peserta', 'userid');
    }
}
