<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matalomba extends Model
{
    protected $table = 't_matalomba';
    public $primaryKey = 'id_matalomba';
    protected $fillable = [
        'id_matalomba',
        'nama_matalomba',
        'tingkat',
        'tipe',
        'waktu'
    ];

    public function jumlahSoal(){
        return $this->hasMany('App\Soal', 'id_matalomba');
    }

    public function kalimat(){
        return $this->hasOne('App\Soal2', 'id_matalomba');
    }
}
