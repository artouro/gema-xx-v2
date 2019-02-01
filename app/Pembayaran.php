<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    public $primaryKey = 'id_pembayaran';
    protected $table = 't_pembayaran';
    protected $fillable = [
        'id_pembayaran', 
        'email',
        'bukti_pembayaran',
        'status',
        'keterangan'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'email', 'email');
    }
}
