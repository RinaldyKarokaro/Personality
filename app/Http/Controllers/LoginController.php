<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){

        return view('login');
    }

    public function authenticate(Request $request){
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email',$request->email)->first();
        // dd($request->all());
        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            if($user->role == 1){
                return redirect()->intended('/dashboard_pengunjung');
            }else if($user->role == 0){
                return redirect()->intended('/dashboard');
            }
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
