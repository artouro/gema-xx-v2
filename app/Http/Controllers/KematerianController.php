<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KematerianController extends Controller
{
    public function index(){
        $data['sd'] = \App\Matalomba::where('tingkat', 'sd')->get();
        $data['smp'] = \App\Matalomba::where('tingkat', 'smp')->get();
        $data['sma'] = \App\Matalomba::where('tingkat', 'sma')->get();

        return view('kematerian.index')->with($data);
    }

    public function add(){
        $data['title'] = 'Add';
        return view('kematerian.add')->with($data);
    }

    public function store(Request $request){
        $input = $request->all();
        $save = \App\Matalomba::create($input);

        if($save) return redirect('d/k')->with('success', 'Matalomba berhasil ditambahkan.');
        else return redirect('d/k')->with('error', 'Matalomba gagal ditambahkan.');
    }

    public function edit($id){
        $data['title'] = 'Edit';
        $data['result'] = \App\Matalomba::where('id_matalomba', $id)->first();
        return view('kematerian.add')->with($data);
    }

    public function update(Request $request, $id){
        $input = $request->all();
        $update = \App\Matalomba::where('id_matalomba', $id)->first()->update($input);
        if($update) return redirect('d/k')->with('success', 'Matalomba berhasil diperbaharui.');
        else return redirect('d/k')->with('error', 'Matalomba gagal diperbaharui.');
    }

    public function destroy($id){
        $delete = \App\Matalomba::where('id_matalomba', $id)->first()->delete();
        if($delete) return redirect('d/k')->with('success', 'Matalomba berhasil dihapus.');
        else return redirect('d/k')->with('error', 'Matalomba gagal dihapus.');
    }

    public function show($id){
        $data['result'] = \App\Matalomba::where('id_matalomba', $id)->first();
        return view('kematerian.soal.index')->with($data);
    }

    public function handling(Request $request){
        ini_set('max_execution_time', 300);
        $res = json_decode($request->input()[0]);
        $data = $res->pengerjaan;
        $success = 0;
        $exist = 0;
        foreach($data as $row){
            $check = \App\Pengerjaan::where('userid', $row->userid)
                        ->where('id_matalomba', $row->id_matalomba)
                        ->first();
            if(empty($check)){
                $arr = [
                    'userid' => $row->userid, 
                    'id_matalomba' => $row->id_matalomba,
                    'waktu_pengerjaan' => $row->waktu_pengerjaan,
                    'nilai' => $row->nilai, 
                    'created_at' => $row->created_at, 
                    'updated_at' => $row->updated_at,
                ];
                $save = \App\Pengerjaan::create($arr);
                if($save) $success++;
            } else {
                $exist++;
                continue;
            }
        }
        return response()->json([
            'message' => $success . ' data berhasil dikirim & ' . $exist . ' tidak dikirim.'
        ]);    
    }
}
