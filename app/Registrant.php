<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrant extends Model
{
    public $primaryKey = 'id_registrant';
    protected $table = 't_registrant';
    protected $fillable = [
        'id_registrant',
        'nama_regu',
        'gender',
        'email',
        'status',
        'created_at',
        'updated_at'
    ];
}
