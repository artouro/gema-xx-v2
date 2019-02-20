<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function index($tingkat = 'sd'){
        if($tingkat == 'sd'){
            // SD
            $data['sdm'] = \App\Matalomba::where('tingkat', 'sd')->orderBy('nama_matalomba')->get();
            $data['jm_sd'] = 9;                    
            $data['sd'] = \App\Peserta::where('level', '3')->get();
        } else if($tingkat == 'smp'){
            // SMP
            $data['sdm'] = \App\Matalomba::where('tingkat', 'smp')->orderBy('nama_matalomba')->get();
            $data['jm_sd'] = 9;                    
            $data['sd'] = \App\Peserta::where('level', '4')->get();
        } else if($tingkat == 'sma'){
            // SMA
            $data['sdm'] = \App\Matalomba::where('tingkat', 'sma')->orderBy('nama_matalomba')->get();
            $data['jm_sd'] = 9;                    
            $data['sd'] = \App\Peserta::where('level', '5')->get();
        }

        $data['i'] = 1;
        return view('rekap.index')->with($data);
    }
    public function detail($tipe = NULL){
        // $data['matalomba'] = \DB::table('t_pengerjaan')
        //                     ->select('id_matalomba')
        //                     ->distinct('id_matalomba')
        //                     ->get();

        $data['matalomba'] = \App\Pengerjaan::distinct('id_matalomba')->get(['id_matalomba']);

        if($tipe != NULL){
            if($tipe == 'peserta') $tipe = 'userid';
            elseif($tipe == 'nilai') $tipe = 'nilai';
            elseif($tipe == 'waktu') $tipe = 'waktu_pengerjaan';
            else return redirect('kompetisi');
        }
        $data['tipe'] = $tipe;
        return view('rekap.detail')->with($data);
    }
}
