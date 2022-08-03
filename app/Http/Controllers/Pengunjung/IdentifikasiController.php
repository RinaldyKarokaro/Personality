<?php

namespace App\Http\Controllers\Pengunjung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Identifikasi;
use App\Models\HasilIdentifikasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Karir;
use App\Models\Pengunjung;
use App\Models\DataKepribadian;
use PDF;

class IdentifikasiController extends Controller
{
    public function index(){
        $identifikasis = Identifikasi::orderBy('id', 'ASC')->get();
        $user = User::find(Auth::user()->id);
        $pengunjung = Pengunjung::where('user_id',Auth::user()->id)->first();
        return view('pengunjung.identifikasi', compact('identifikasis','user','pengunjung'));
    }

    public function check(Request $request){
        $pengunjung  =  Pengunjung::where('user_id',Auth::user()->id)->first();
        $identifikasis = Identifikasi::orderBy('id', 'ASC')->get();
        $count = Identifikasi::orderBy('id', 'ASC')->count();
        
        $sumDominance = 0;$sumInfluence = 0;$sumSteadiness = 0;$sumCompliance = 0;
        $hasil ='';
        $karir;

        $identifikasi_get_req = [];
        $identifikasis = DB::table('identifikasis')->select('*')->get();
        foreach($identifikasis as $item){
            $kode_fix = $item->id;
            $kode_kepribadian = new \stdClass;
            $kode_kepribadian = $request->$kode_fix;
            array_push($identifikasi_get_req, $kode_kepribadian);
        }


        foreach($identifikasi_get_req as $item){
            foreach($identifikasis as $secondItem){
                if($item == $secondItem->dominance){
                    $sumDominance +=1;
                }
                elseif($item == $secondItem->influence){
                    $sumInfluence +=1;
                }
                elseif($item == $secondItem->steadiness){
                    $sumSteadiness +=1;
                }
                elseif($item == $secondItem->compliance){
                    $sumCompliance +=1;
                }
            }
        }
        // dd($sumDominance,$sumInfluence,$sumSteadiness,$sumCompliance);
        if($sumDominance >= $sumInfluence && $sumDominance >= $sumSteadiness && $sumDominance >= $sumCompliance){
            if($sumDominance == $sumInfluence || $sumDominance == $sumSteadiness || $sumDominance == $sumCompliance){
                return back()->withErrors(['msg' => 'Terjadi kesalahan,mohon lakukan pengecekan ulang']);
            }
            elseif($sumInfluence >= $sumSteadiness && $sumInfluence >= $sumCompliance){
                if($sumInfluence == $sumSteadiness || $sumInfluence == $sumCompliance){
                    $hasil = "Dominance";
                    $karir = Karir::where('kategori','Dominance')->get();   
                }
                else{
                    $hasil = "Dominance and Influence";
                    $karir = Karir::where('kategori','Dominance and Influence')->get();
                }
            }
            elseif($sumCompliance >= $sumInfluence && $sumCompliance >= $sumSteadiness){
                if($sumCompliance == $sumInfluence || $sumCompliance == $sumSteadiness){
                    $hasil = "Dominance";
                    $karir = Karir::where('kategori','Dominance')->get();  
                }
                else{
                    $hasil = "Dominance and Compliance";
                    $karir = Karir::where('kategori','Dominance and Compliance')->get();
                }
            }
            else{
                $hasil = "Dominance";
                $karir = Karir::where('kategori','Dominance')->get();
            }
        }
        elseif($sumInfluence >= $sumDominance && $sumInfluence >= $sumSteadiness && $sumInfluence >= $sumCompliance){
            if($sumInfluence == $sumDominance || $sumInfluence == $sumSteadiness || $sumInfluence == $sumCompliance){
                return back()->withErrors(['msg' => 'Terjadi kesalahan,mohon lakukan pengecekan ulang']);
            }
            elseif($sumDominance >= $sumSteadiness && $sumDominance >= $sumCompliance){
                if($sumDominance == $sumSteadiness || $sumDominance == $sumCompliance){
                    $hasil = "Influence";
                    $karir = Karir::where('kategori','Influence')->get();  
                }
                else{
                    $hasil = "Influence and Dominance";
                    $karir = Karir::where('kategori','Influence and Dominance')->get();
                }
            }
            elseif($sumSteadiness >= $sumDominance && $sumSteadiness >= $sumCompliance){
                if($sumSteadiness == $sumDominance || $sumSteadiness == $sumCompliance){
                    $hasil = "Influence";
                    $karir = Karir::where('kategori','Influence')->get();   
                }
                else{
                    $hasil = "Influence and Steadiness";
                    $karir = Karir::where('kategori','Influence and Steadiness')->get();
                }
            }
            else{
                $hasil = "Influence";
                $karir = Karir::where('kategori','Influence')->get();
            }
        }
        elseif($sumSteadiness >= $sumDominance && $sumSteadiness >= $sumInfluence && $sumSteadiness >= $sumCompliance){
            if($sumSteadiness == $sumDominance || $sumSteadiness == $sumInfluence || $sumSteadiness == $sumCompliance){
                return back()->withErrors(['msg' => 'Terjadi kesalahan,mohon lakukan pengecekan ulang']);
            }
            elseif($sumInfluence >= $sumDominance && $sumInfluence >= $sumCompliance){
                if($sumInfluence == $sumDominance || $sumInfluence == $sumCompliance){
                    $hasil = "Steadiness";
                    $karir = Karir::where('kategori','Steadiness')->get();  
                }
                else{
                    $hasil = "Steadiness and Influence";
                    $karir = Karir::where('kategori','Steadiness and Influence')->get();
                }
            }
            elseif($sumCompliance >= $sumDominance && $sumCompliance >= $sumInfluence){
                if($sumCompliance == $sumDominance || $sumCompliance == $sumInfluence){
                    $hasil = "Steadiness";
                    $karir = Karir::where('kategori','Steadiness')->get();   
                }
                else{
                    $hasil = "Steadiness and Compliance";
                    $karir = Karir::where('kategori','Steadiness and Compliance')->get();
                }
            }
            else{
                $hasil = "Steadiness";
                $karir = Karir::where('kategori','Steadiness')->get();
            }
        }
        elseif($sumCompliance >= $sumDominance && $sumCompliance >= $sumInfluence && $sumCompliance >= $sumSteadiness){
            if($sumCompliance == $sumDominance || $sumCompliance == $sumInfluence || $sumCompliance == $sumSteadiness){
                return back()->withErrors(['msg' => 'Terjadi kesalahan,mohon lakukan pengecekan ulang']);
            }
            elseif($sumDominance >= $sumInfluence && $sumDominance >= $sumSteadiness){
                if($sumDominance == $sumInfluence || $sumDominance == $sumSteadiness){
                    $hasil = "Compliance";
                    $karir = Karir::where('kategori','Compliance')->get();  
                }
                else{
                    $hasil = "Compliance and Dominance";
                    $karir = Karir::where('kategori','Compliance and Dominance')->get();
                }
            }
            elseif($sumSteadiness >= $sumDominance && $sumSteadiness >= $sumInfluence){
                if($sumSteadiness == $sumDominance || $sumSteadiness == $sumInfluence){
                    $hasil = "Compliance";
                    $karir = Karir::where('kategori','Compliance')->get();   
                }
                else{
                    $hasil = "Compliance and Steadiness";
                    $karir = Karir::where('kategori','Compliance and Steadiness')->get();
                }
            }
            else{
                $hasil = "Compliance";
                $karir = Karir::where('kategori','Compliance')->get();
            }
        }
        $karir_all = [];
        foreach($karir as $item){
            array_push($karir_all, $item->karir);
        }
        $history = HasilIdentifikasi::create([
            'pengunjung_id' => $pengunjung->id,
            'identifikasi_id' => $identifikasi_get_req,
            'karir' => $karir_all,
            'tanggal' => Carbon::now()->format('Y-m-d'),
            'hasil' => $hasil
        ]);
        return redirect()->route('hasilIdentifikasi',[
            'history' => $history->id,
            'identifikasi_get_req' => $identifikasi_get_req,
            'sumDominance'=>$sumDominance,
            'sumInfluence'=>$sumInfluence,
            'sumSteadiness'=>$sumSteadiness,
            'sumCompliance' =>$sumCompliance,
            'count' =>$count,
            'karir' =>$karir
        ]);
    }

    public function hasil(Request $request){
        // dd($request->all());
        $pengunjung = Pengunjung::where('user_id',Auth::user()->id)->first();
        $user = User::find(Auth::user()->id);
        $history = HasilIdentifikasi::where('id',$request->history)->first();
        $karir = Karir::where('Kategori',$history->hasil)->get();
        $kepribadian = DataKepribadian::where('kategori',$history->hasil)->get();
        // dd($kepribadian);
        return view('pengunjung.hasilIdentifikasi', compact('user','pengunjung'),[
            'history' => $history,
            'identifikasi_get_req' => $request->identifikasi_get_req,
            'sumDominance'=>$request->sumDominance,
            'sumInfluence'=>$request->sumInfluence,
            'sumSteadiness'=>$request->sumSteadiness,
            'sumCompliance' =>$request->sumCompliance,
            // 'count' =>$request->count,
            'karir' =>$karir,
            'kepribadian' => $kepribadian
        ]);
    }
    public function cetak(Request $request){
        $user = User::where('id',Auth::user()->id)->first();
        $pengunjung = Pengunjung::where('user_id',Auth::user()->id)->first();
        $history = HasilIdentifikasi::where('id',$request->history)->first();
        // dd($history);
        $karir = Karir::where('Kategori',$history->hasil)->get();
        $kepribadian = DataKepribadian::where('kategori',$history->hasil)->get();
        $pdf = PDF::loadview('pengunjung.cetak-hasil',[
            'user' => $user,
            'history' => $history,
            'sumDominance'=>$request->sumDominance,
            'sumInfluence'=>$request->sumInfluence,
            'sumSteadiness'=>$request->sumSteadiness,
            'sumCompliance' =>$request->sumCompliance,
            'count' =>$request->count,
            'karir' =>$karir,
            'kepribadian' => $kepribadian,
            'pengunjung' => $pengunjung
        ])->setOptions(['defaultFont' => 'sans-serif']);
        
        return $pdf->download('laporan-kepribadian.pdf');
        // return view('pengunjung.cetak-hasil', compact('user'),[
        //     'history' => $history,
        //     'sumDominance'=>$request->sumDominance,
        //     'sumInfluence'=>$request->sumInfluence,
        //     'sumSteadiness'=>$request->sumSteadiness,
        //     'sumCompliance' =>$request->sumCompliance,
        //     'count' =>$request->count,
        //     'karir' =>$karir,
        //     'kepribadian' => $kepribadian
        // ]);
    }
}
