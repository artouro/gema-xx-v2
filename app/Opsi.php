<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opsi extends Model
{
    protected $table = 't_opsi';
    public $primaryKey = 'id_opsi';

    protected $fillable = [
        'id_soal', 'opsi_ke', 'teks_opsi'
    ];

    public function soal(){
        return $this->belongsToMany('App\Soal', 'id_soal');
    }
}
