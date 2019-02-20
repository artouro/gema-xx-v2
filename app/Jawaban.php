<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 't_jawaban';
    public $primaryKey = 'id_jawaban';
    protected $fillable = [
        'id_pengerjaan', 'id_soal', 'jawaban_peserta'
    ];
}
