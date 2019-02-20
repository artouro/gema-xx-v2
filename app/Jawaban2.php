<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban2 extends Model
{
    protected $table = 't_jawaban2';
    public $primaryKey = 'id_jawaban2';
    protected $fillable = [
        'id_pengerjaan', 'kata_1', 'kata_2', 'kata_3', 'kata_4',
        'kata_5', 'kata_6', 'kata_7', 'kata_8', 'kata_9', 'kata_10'
    ];
}
