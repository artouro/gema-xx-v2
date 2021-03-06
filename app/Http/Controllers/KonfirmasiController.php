<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KonfirmasiController extends Controller
{
    public function index(){
        return view('konfirmasi');
    }
    public function store(Request $request){
        $rules = [
            'bukti_pembayaran' => 'required|mimes:jpeg,jpg,png|max:1024'
        ];
        $messages = [
            'required' => ':attribute tidak boleh kosong.',
            'size' => 'File :attribute melebihi ukuran maksimal 1 MB.',
            'mimes' => 'File :attribute tidak berformat jpg atau png.',
        ];

        $this->validate($request, $rules, $messages);

        if($request->hasFile('bukti_pembayaran') && $request->file('bukti_pembayaran')->isValid()){
            $email = \Auth::user()->email;
            $nama = \Auth::user()->nama;
            $pangkalan = \Auth::user()->pangkalan;
            $time = strtotime(now());

            $filename =  $pangkalan . "_" . $nama . "-" . $time . "." . $request->file('bukti_pembayaran')->getClientOriginalExtension();
    		$save = $request->file('bukti_pembayaran')->storeAs('bukti_pembayaran', $filename);
            
            $input['email'] = $email;
            $input['bukti_pembayaran'] = $filename;
            $input['keterangan'] = $request->keterangan;
            
            $save = \App\Pembayaran::create($input);
            
            if($save) return redirect('/d/konfirmasi')->with('success', 'Bukti pembayaran berhasil diunggah.');
            else return redirect('/d/konfirmasi')->with('error', 'Bukti pembayaran gagal diunggah.');
        }
        
    }

    public function storeByPanitia(Request $request){
        $rules = [
            'bukti_pembayaran' => 'required|mimes:jpeg,jpg,png|max:1024',
            'userid' => 'required'
        ];
        $messages = [
            'required' => ':attribute tidak boleh kosong.',
            'size' => 'File :attribute melebihi ukuran maksimal 1 MB.',
            'mimes' => 'File :attribute tidak berformat jpg atau png.',
        ];

        $this->validate($request, $rules, $messages);

        if($request->hasFile('bukti_pembayaran') && $request->file('bukti_pembayaran')->isValid()){
            $userid = $request->userid;
            $target = \App\User::where('userid', $userid)->first();

            $nama = $target->nama;
            $pangkalan = $target->pangkalan;
            $time = strtotime(now());

            $filename =  $pangkalan . "_" . $nama . "-" . $time . "." . $request->file('bukti_pembayaran')->getClientOriginalExtension();
    		$save = $request->file('bukti_pembayaran')->storeAs('', $filename);
            
            $input['bukti_pembayaran'] = $filename;
            
            $goingToUpdate = \App\User::where('userid', $userid)->first()->update($input);
            
            if($goingToUpdate) return redirect('/d/konfirmasi')->with('success', 'Bukti pembayaran berhasil diunggah.');
            else return redirect('/d/konfirmasi')->with('error', 'Bukti pembayaran gagal diunggah.');
        }
    }

    public function konfirmasi($id){
        $target = \App\User::where('id', $id)->first();
        $data = \App\Pembayaran::where('email', $target->email)->get();
        $input = [
            'status' => 1
        ];
        $count = 0;
        foreach($data as $row){
            $confirm = $row->update($input);
            if($confirm) $count += 1;
        }
        if($count == count($data)) return redirect('d/g/' . $id)->with('success', 'Konfirmasi pembayaran berhasil.');
        else return redirect('d/g/' . $id)->with('error', 'Konfirmasi pembayaran gagal.');
    }
}
