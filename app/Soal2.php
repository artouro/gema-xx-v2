<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal2 extends Model
{
    protected $table = 't_soal2';
    public $primaryKey = 'id_soal2';
    protected $fillable = [
        'id_soal2',
        'id_matalomba',
        'kata_1',
        'kata_2',
        'kata_3',
        'kata_4',
        'kata_5',
        'kata_6',
        'kata_7',
        'kata_8',
        'kata_9',
        'kata_10'
    ];

    public function matalomba(){
        return $this->belongsTo('App\Matalomba');
    }
}
