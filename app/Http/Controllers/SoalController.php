<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Matalomba;
use \App\Soal;
use \App\Soal2;
use \App\Opsi;

class SoalController extends Controller
{
    public function index($id, $soal = NULL){
        if($soal == NULL){
            $data['title'] = 'Add';
        } else {
            $data['title'] = 'Edit';
            $data['soal'] = Soal::find($soal);
            $data['opsi'] = Opsi::where('id_soal', $soal)->get();
        }
        $data['result'] = Matalomba::find($id);
        return view('kematerian.soal.add')->with($data);
    }

    public function edit($id){
            $data['title'] = 'Edit';
            $data['soal'] = Soal2::where('id_matalomba', $id)->first();
        $data['result'] = Matalomba::find($id);
        return view('kematerian.soal.add')->with($data);
    }

    public function store(Request $request, $id){
        if($request->tipe === 'Pilihan Ganda'){
            $rules = [
                'soal' => 'required',
                'opsi1' => 'required',
                'opsi2' => 'required',
                'opsi3' => 'required',
                'opsi4' => 'required',
                'opsi5' => 'required',
                'jawaban_benar' => 'required',
                'gambar' => 'mimes:jpeg,png,jpg|max:1024'
            ];
            $this->validate($request, $rules);
            $input_soal = [
                'id_matalomba' => $id,
                'jawaban_benar' => $request->jawaban_benar,
                'soal' => $request->soal
            ];
    
            $save = \App\Soal::create($input_soal);
    
            if($request->hasFile('gambar') && $request->file('gambar')->isValid()){
                $id_soal = \DB::table('t_soal')->select('id_soal')->orderBy('created_at', 'desc')->first()->id_soal;
    
                $filename =  $id_soal . "." . $request->file('gambar')->getClientOriginalExtension();
                $request->file('gambar')->storeAs('soal', $filename);
                
                $input['gambar'] = $filename;
                
                $goingToUpdate = \App\Soal::where('id_soal', $id_soal)->first()->update($input);
            }
            
            $query = \App\Soal::where('id_matalomba', $id)->orderBy('updated_at', 'desc')->first();
    
            $opsi = [$request->opsi1, $request->opsi2, $request->opsi3, $request->opsi4, $request->opsi5];
            for($i = 0; $i < 5; $i++){
                $input_opsi = [
                    'id_soal' => $query->id_soal,
                    'opsi_ke' => ($i+1),
                    'teks_opsi' => $opsi[$i]
                ];
                $save = \App\Opsi::create($input_opsi);
            }
            if($save) return redirect('/d/k/'.$id.'/add')->with('success', 'Data berhasil ditambahkan.');
            else return redirect('/d/k/'.$id.'/add')->with('error', 'Data gagal ditambahkan.');
        } else if($request->tipe === 'Kalimat'){
            $input = $request->all();
            $input['id_matalomba'] = $id;

            $save = \App\Soal2::create($input);
            if($save) return redirect('/d/k/'.$id.'/add')->with('success', 'Data berhasil ditambahkan.');
            else return redirect('/d/k/'.$id.'/add')->with('error', 'Data gagal ditambahkan.');
        }
    }

    public function update(Request $request, $id, $soal = NULL){
        if($request->tipe === 'Pilihan Ganda'){
            $rules = [
                'soal' => 'required',
                'opsi1' => 'required',
                'opsi2' => 'required',
                'opsi3' => 'required',
                'opsi4' => 'required',
                'opsi5' => 'required',
                'jawaban_benar' => 'required',
                'gambar' => 'mimes:jpeg,png,jpg|max:1024'
            ];
            $this->validate($request, $rules);
            $input_soal = [
                'id_matalomba' => $id,
                'jawaban_benar' => $request->jawaban_benar,
                'soal' => $request->soal
            ];
    
            $save = \App\Soal::where('id_soal', $soal)->update($input_soal);
    
            if($request->hasFile('gambar') && $request->file('gambar')->isValid()){
                $id_soal = $soal;
    
                $filename =  $id_soal . "." . $request->file('gambar')->getClientOriginalExtension();
                $request->file('gambar')->storeAs('soal', $filename);
                
                $input['gambar'] = $filename;
                
                $goingToUpdate = \App\Soal::where('id_soal', $id_soal)->first()->update($input);
            }
            $opsi = [$request->opsi1, $request->opsi2, $request->opsi3, $request->opsi4, $request->opsi5];
            for($i = 0; $i < 5; $i++){
                $input_opsi = [
                    'teks_opsi' => $opsi[$i]
                ];
                $save = \App\Opsi::where('id_soal', $soal)->where('opsi_ke', ($i+1))->update($input_opsi);
            }

            if($save) return redirect('/d/k/'.$id)->with('success', 'Data berhasil diubah.');
            else return redirect('/d/k/'.$id)->with('error', 'Data gagal diubah.');
        } else if($request->tipe === 'Kalimat'){
            $input = $request->except(['_token', 'tipe']);
            $save = \App\Soal2::where('id_matalomba', $id)->update($input);
            if($save) return redirect('/d/k/'.$id)->with('success', 'Data berhasil diubah.');
            else return redirect('/d/k/'.$id)->with('error', 'Data gagal diubah.');
        }
    }

    public function destroy($id){
        $data = \App\Soal::find($id);
        $delete = $data->delete();
        if($delete) return redirect('/d/k/'. old($data->id_matalomba))->with('success', 'Data berhasil dihapus.');
        else return redirect('/d/k/'.old($data->id_matalomba))->with('error', 'Data gagal dihapus.');
    }
}
