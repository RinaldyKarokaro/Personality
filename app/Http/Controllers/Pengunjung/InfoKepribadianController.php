<?php

namespace App\Http\Controllers\Pengunjung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pengunjung;
use App\Models\LayananKepribadian;

class InfoKepribadianController extends Controller
{
    public function index(){
        $user = User::find(Auth::user()->id);
        $pengunjung = Pengunjung::where('user_id',Auth::user()->id)->first();
        $layanan = LayananKepribadian::all();
        return view('pengunjung.kepribadian',compact('user','pengunjung','layanan'));
    }
}
