<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Registrant;

class KepesertaanController extends Controller
{
    public function index($id = NULL){
        if(\Auth::user()->level >= 3 && !empty($id)){
            return redirect('d/g');
        }

        if(empty($id)){
            $user = \Auth::user();
        } else {
            $user = \App\User::where('id', $id)->first();
        }
        // Get data registrant ..
        $email = $user->email;
        $data['peserta'] = Registrant::where('email', $email)->get();
        $data['user'] = $user;
        // Get data status pembayaran ..
        $target = \App\Pembayaran::where('email', $email)->first();
        if(empty($target)) $status = '-';
        elseif($target && $target->bukti_pembayaran && empty($target->status)) $status = 'Menunggu konfirmasi panitia';
        elseif($target && $target->bukti_pembayaran && $target->status) $status = 'LUNAS';
        $data['status'] = $status;

        $target = \App\Pembayaran::where('email', $email)->get();
        $data['bukti_pembayaran'] = $target;

        return view('peserta.index')->with($data);
    }

    public function store(Request $request){
        $input = $request->all();
        $input['email'] = \Auth::user()->email;
        $save = Registrant::create($input);
        if($save) return redirect('d/g')->with('success', 'Regu anda berhasil didaftarkan.');
        else return redirect('d/g')->with('error', 'Regu anda gagal didaftarkan.');
    }

    public function update(Request $request, $id){
        $input = $request->except(['_token']);
        $save = Registrant::where('id_registrant', $id)->update($input);
        if($save) return redirect('d/g')->with('success', 'Data regu anda berhasil diperbaharui.');
        else return redirect('d/g')->with('error', 'Data regu anda gagal diperbaharui.');
    }

    public function destroy($id){
        $target = Registrant::find($id)->first();
        $delete = $target->delete();
        if($delete) return redirect('d/g')->with('success', 'Regu anda berhasil dihapus.');
        else return redirect('d/g')->with('error', 'Regu anda gagal dihapus.');
    }

    // Formulir Pendaftaran
    public function show(){
        return view('peserta.form_lkbb');
    }

    public function upload(Request $request){
        $rules = [
            'form_lkbb' => 'required|mimes:pdf'
        ];
        $messages = [
            'required' => ':attribute tidak boleh kosong.',
            'mimes' => 'File :attribute tidak berformat pdf.',
        ];

        $this->validate($request, $rules, $messages);

        if($request->hasFile('form_lkbb') && $request->file('form_lkbb')->isValid()){
            $email = \Auth::user()->email;
            $nama = \Auth::user()->nama;
            $pangkalan = \Auth::user()->pangkalan;
            $time = strtotime(now());

            $filename =  $pangkalan . "_" . $nama . "-" . $time . "." . $request->file('form_lkbb')->getClientOriginalExtension();
    		$save = $request->file('form_lkbb')->storeAs('form_lkbb', $filename);
            
            $input['email'] = $email;
            $input['form_lkbb'] = $filename;
            
            $save = \App\User::where('email', $email)->update($input);
            
            if($save) return redirect('/d/g/form_lkbb')->with('success', 'Formulir LKBB berhasil diunggah.');
            else return redirect('/d/g/form_lkbb')->with('error', 'Formulir LKBB gagal diunggah.');
        }
    }

    //List Pendaftar
    public function list(){
        $data['sd'] = \App\User::where('level', '3')->get();
        $data['smp'] = \App\User::where('level', '4')->get();
        $data['sma'] = \App\User::where('level', '5')->get();
        return view('registrant')->with($data);
    }
}
