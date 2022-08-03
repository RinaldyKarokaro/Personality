<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengunjung;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index(){

        return view('register');
    }

    public function store(Request $request){
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'username' => "required",
            'pekerjaan' => "required",
            'email' => "required",
            'no_telp' => "required",
            'password' => "required|min:6|max:255",
            'role' => "required",
            'konfirmasiPassword' => "required|same:password|min:6"
        ]);
        if ($validate->fails()) {
            // return redirect('/register')
            //             ->withErrors($validate)
            //             ->withInput();
            return back()->withInput()->withErrors($validate);
        }
        $password = bcrypt($request['password']);
        
        $user =User::create([
            'role' => $request->role,
            'email' => $request->email,
            'password' => $password
        ]);

        $pengunjung = Pengunjung::create([
            'user_id' => $user->id,
            'nama' => $request->username,
            'pekerjaan' => $request->pekerjaan,
            'no_telp' => $request->no_telp,
        ]);

        $request->session()->flash('success', 'Registrasi Succsess! please login');
        return redirect('/login');
    }
}
