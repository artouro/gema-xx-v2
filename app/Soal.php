<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 't_soal';
    public $primaryKey = 'id_soal';
    protected $fillable = [
        'id_soal',
        'id_matalomba',
        'soal',
        'gambar',
        'jawaban_benar'
    ];

    public function matalomba(){
        return $this->belongsTo('App\Matalomba');
    }
    public function opsi(){
        return $this->hasMany('App\Opsi', 'id_soal');
    }
}
