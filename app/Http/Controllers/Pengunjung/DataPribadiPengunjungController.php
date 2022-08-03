<?php

namespace App\Http\Controllers\Pengunjung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DataPribadiPengunjungController extends Controller
{
    public function index(){
        $user = User::find(Auth::user()->id);
        $pengunjung = Pengunjung::where('user_id',Auth::user()->id)->first();
        return view('pengunjung.datapribadi',compact('pengunjung','user'));
    }
}
