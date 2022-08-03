<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Komentar;
use Carbon\Carbon;
use App\Models\HasilIdentifikasi;
use App\Models\Balasan;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    public function index(){

        $user = User::find(Auth::user()->id);
        $komentars = DB::table('komentars')
                        ->join('users', 'users.id','=','komentars.user_id')
                        ->join('balasans', 'komentars.id','=','balasans.komentar_id')
                        ->select('komentars.*','users.email','balasans.id as balasan_id','balasans.balasan')
                        ->get();
        $harian = HasilIdentifikasi::where('tanggal', Carbon::now()->format('Y-m-d'))->count();
        $bulanan = HasilIdentifikasi::whereDate('created_at','>', Carbon::now()->subMonth())->count();
        $all = HasilIdentifikasi::all()->count();
        // dd($komentars);
        return view('admin.layananPertanyaan', compact('komentars','user'))
                                    ->with('harian', $harian)
                                    ->with('bulanan', $bulanan)
                                    ->with('all', $all);
    }

    public function balas($id){
        $komentars = DB::table('komentars')
        ->join('balasans', 'komentars.id','=','balasans.komentar_id')
        ->select('komentars.*','balasans.id as balasan_id','balasans.balasan')
        ->where('balasans.id','=',$id)
        ->get();
        // dd($komentars);
        // Komentar::find($id);
        
        $user = User::find(Auth::user()->id);
        $harian = HasilIdentifikasi::where('tanggal', Carbon::now()->format('Y-m-d'))->count();
        $bulanan = HasilIdentifikasi::whereDate('created_at','>', Carbon::now()->subMonth())->count();
        $all = HasilIdentifikasi::all()->count();
        return view('admin.balasPertanyaan', compact('komentars','user'))
                                    ->with('harian', $harian)
                                    ->with('bulanan', $bulanan)
                                    ->with('all', $all);
    }

    public function kirim(Request $request){
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'balasan' => "required",
        ]);
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }
        $balasan = Balasan::find($request->balasan_id);
        // dd($balasan->balasan);
        // if($balasan->balasan == null){
        //     $balasan->update($request->all());
        // }else{
            $balasan = Balasan::create([
                'komentar_id' => $request->komentar_id,
                'balasan' => $request->balasan
            ]);
        // }
        
        return redirect('/layananPertanyaan');
    }
}
