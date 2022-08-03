<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kepribadian;
use App\Models\Pengunjung;
use App\Models\History;
use Illuminate\Support\Facades\DB;

class IdentifikasiController extends Controller
{
    public function index(){
        $kepribadians = Kepribadian::orderBy('kategori', 'ASC')->get();
        dd($kepribadians);
        return view('pengunjung.identifikasi', compact('kepribadians'));
    }

    public function check(Request $request){
        // dd($request->all());

        $pengunjung = Pengunjung::create([
            'nama' => $request->name,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        $pengunjung = Pengunjung::latest('created_at')->first();

        if($request->sifat != null){
            foreach ($request->sifat as $data) {
                $kepribadian = Kepribadian::find($data);
                $history = History::create([
                    'pengunjung_id' => $pengunjung->id,
                    'kepribadian_id' => $kepribadian->id,
                    'history_date' => $pengunjung->created_at
                ]);
            }
        }

        $historys = History::where('pengunjung_id',$pengunjung->id)->get();

        $totalKoleris = Kepribadian::where("kategori","Koleris")->count("kategori");
        $koleris = DB::table('kepribadians')
                ->select('kepribadians.kategori')
                ->join('histories','histories.kepribadian_id','=','kepribadians.id')
                ->where(['kepribadians.kategori' => 'Koleris'])
                ->count();

        $totalSanguinis = Kepribadian::where("kategori","Sanguinis")->count("kategori");
        $sanguinis = DB::table('kepribadians')
                ->select('kepribadians.kategori')
                ->join('histories','histories.kepribadian_id','=','kepribadians.id')
                ->where(['kepribadians.kategori' => 'Sanguinis'])
                ->count();


        $totalMelankolis = Kepribadian::where("kategori","Melankolis")->count("kategori");
        $melankolis = DB::table('kepribadians')
                ->select('kepribadians.kategori')
                ->join('histories','histories.kepribadian_id','=','kepribadians.id')
                ->where(['kepribadians.kategori' => 'Melankolis'])
                ->count();

        $totalPhlegmatis = Kepribadian::where("kategori","Phlegmatis")->count("kategori");
        $phlegmatis = DB::table('kepribadians')
                ->select('kepribadians.kategori')
                ->join('histories','histories.kepribadian_id','=','kepribadians.id')
                ->where(['kepribadians.kategori' => 'Phlegmatis'])
                ->count();

        $persenKoleris = $koleris/$totalKoleris;
        $persenSanguinis = $sanguinis/$totalPhlegmatis;
        $persenMelankolis = $melankolis/$totalMelankolis;
        $persenPhlegmatis = $phlegmatis/$totalPhlegmatis;

        // dd($persenKoleris,$persenMelankolis,$persenPhlegmatis,$persenSanguinis);

        return view('hasilIdentifikasi')->with('historys',$historys)
                                        ->with('pengunjung',$pengunjung);

    }
}
