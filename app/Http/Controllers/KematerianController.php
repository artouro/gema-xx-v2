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
}
