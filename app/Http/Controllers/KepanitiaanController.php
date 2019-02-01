<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KepanitiaanController extends Controller
{
    public function index(){
        $data['panitia'] = \App\User::where('level', 2)->get();
        return view('panitia')->with($data);
    }

    public function show(){
        return view('form_panitia');
    }

    public function store(Request $request){
        $input = $request->all();
        $input['level'] = 2;
        $input['password'] = bcrypt($request->password);

        $save = \App\User::create($input);
        if($save) return redirect('d/form_panitia')->with('success', 'Panitia berhasil ditambahkan.');
        else return redirect('d/form_panitia')->with('error', 'Panitia gagal ditambahkan.');
    }
}
