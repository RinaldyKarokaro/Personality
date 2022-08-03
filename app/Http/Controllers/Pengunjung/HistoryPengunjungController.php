<?php

namespace App\Http\Controllers\Pengunjung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengunjung;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryPengunjungController extends Controller
{
    public function index(){
        $user = User::find(Auth::user()->id);
        $pengunjung = Pengunjung::where('user_id',Auth::user()->id)->first();
        $history = DB::table('hasil_identifikasis')
        ->join('pengunjungs', 'pengunjungs.id','=','hasil_identifikasis.pengunjung_id')
        ->select('hasil_identifikasis.*','pengunjungs.*')
        ->where('hasil_identifikasis.pengunjung_id','=',$pengunjung->id)
        ->get();
        // dd($history);
        return view('pengunjung.historypengunjung', compact('user','history','pengunjung'));
    }
}
