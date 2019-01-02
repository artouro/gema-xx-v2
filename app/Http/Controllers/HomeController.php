<?php

namespace App\Http\Controllers;

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
        $input['userid'] = $request->email_pinru;
        $input['password'] = bcrypt($request->password);
        $save = \App\User::create($input);

        if($save) return redirect('/login');
        else { return redirect('/'); }
    }
}
