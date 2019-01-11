<?php

namespace App\Http\Controllers;
use \App\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }
    public function dashboard(){
        return view('dashboard');
    }
    public function registration(Request $request){
        $input = $request->all();

        //Email unique check;
        $check = User::where('userid', $request->email_pinru)->first();
        if($check) return redirect('/login')->with('error', 'Gagal : Email Pinru/Pinsa telah digunakan.');
        //Level validation check
        if($request->level < 1 || $request->level > 5){
            return redirect('/')->with('error', 'Masukkan tingkat sesuai pilihan yang tersedia');
        }
        $input['userid'] = $request->email_pinru;
        $input['password'] = bcrypt($request->password);
        $save = User::create($input);

        if($save) return redirect('/login')->with('success', 'Registrasi berhasil. Silahkan login untuk melakukan konfirmasi pembayaran.');
        else { return redirect('/')->with(); }
    }

    public function registrant(){
        $data['sdputra'] = User::where(['level' => '3', 'gender' => 'putra'])->get();
        $data['smpputra'] = User::where(['level' => '4', 'gender' => 'putra'])->get();
        $data['smaputra'] = User::where(['level' => '5', 'gender' => 'putra'])->get();

        $data['sdputri'] = User::where(['level' => '3', 'gender' => 'putri'])->get();
        $data['smpputri'] = User::where(['level' => '4', 'gender' => 'putri'])->get();
        $data['smaputri'] = User::where(['level' => '5', 'gender' => 'putri'])->get();

        return view('registrant')->with($data);
    }

    public function activate($userid){
        $change = ['aktif' => 1];
        $target = User::where('userid', $userid)->first();
        $update = $target->update($change);
        if($update) {
            return redirect('/d/registrant')->with('success', 'Konfirmasi pembayaran berhasil.');
        } else {
            return redirect('/d/registrant')->with('error', 'Konfirmasi pembayaran gagal.');
        }
    }
    
    public function panitia(){
        $data['panitia'] = \App\User::where('level', 2)->get();
        return view('panitia')->with($data);
    }

    public function add_panitia(){
        return view('add_panitia');
    }

    public function store_panitia(Request $request){
        $input = $request->all();
        $input['userid'] = $request->email_pinru;
        $input['level'] = 2;
        $input['email_pinru'] = '-';
        $input['email_pembina'] = '-';
        $input['telp_pinru'] = '-';
        $input['telp_pembina'] = '-';
        $input['aktif'] = 1;
        $input['password'] = bcrypt($request->password);

        $save = \App\User::create($input);
        if($save) return redirect('d/add_panitia')->with('success', 'Panitia berhasil ditambahkan.');
        else return redirect('d/add_panitia')->with('error', 'Panitia gagal ditambahkan.');
    }

    public function add_user(){
        return view('add_user');
    }

    public function store_user(Request $request){
        $input = $request->all();
        $rules = [
            'nama' => 'required',
            'gender' => 'required',
            'pangkalan' => 'required',
            'level' => 'required',
            'email_pinru' => 'required',
            'email_pembina' => 'required',
            'telp_pinru' => 'required',
            'telp_pembina' => 'required',
            'password' => 'required',
        ];
        $this->validate($request, $rules);
        
        //Validate email pinru uniqueness ..
        $check = User::where('userid', $request->email_pinru)->first();
        if($check) return redirect('/d/add_user')->with('error', 'Gagal : Email Pinru/Pinsa telah digunakan.');

        // Check level value ..
        if($request->level < 1 || $request->level > 5){
            return redirect('/d/add_user')->with('error', 'Masukkan tingkat sesuai pilihan yang tersedia');
        }
        $input['userid'] = $request->email_pinru;
        $input['password'] = bcrypt($request->password);
        $save = User::create($input);

        if($save) return redirect('/d/add_user')->with('success', 'Registrasi peserta berhasil.');
        else { return redirect('/d/add_user')->with('error', 'Registrasi peserta gagal.'); }
    }
}
