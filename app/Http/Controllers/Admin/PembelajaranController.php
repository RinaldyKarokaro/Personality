<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipeBelajar;
use Carbon\Carbon;
use App\Models\History;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PembelajaranController extends Controller
{
    public function index(){

        $user = User::find(Auth::user()->id);
        $tipe_belajars = TipeBelajar::orderBy('kategori', 'ASC')->get();
        $harian = History::where('history_date', Carbon::now()->format('Y-m-d'))->count();
        $bulanan = History::whereDate('created_at','>', Carbon::now()->subMonth())->count();
        $all = History::all()->count();

        return view('admin.kelolaPembelajaran', compact('tipe_belajars','user'))
                                            ->with('harian', $harian)
                                            ->with('bulanan', $bulanan)
                                            ->with('all', $all);
    }

    public function indexCreate(){
        
        $user = User::find(Auth::user()->id);
        $tipe_belajar = TipeBelajar::orderBy('kategori', 'ASC')->get();
        $harian = History::where('history_date', Carbon::now()->format('Y-m-d'))->count();
        $bulanan = History::whereDate('created_at','>', Carbon::now()->subMonth())->count();
        $all = History::all()->count();

        return view('admin.createPembelajaran', compact('tipe_belajar'.'user'))
                                            ->with('harian', $harian)
                                            ->with('bulanan', $bulanan)
                                            ->with('all', $all);
    }

    public function create(Request $request){
        $this->validate($request, [
            'jenis_kepribadian' => 'required|string|max:155',
            'keterangan' => 'required'
        ]);
        

        $tipe_belajar = TipeBelajar::create([
            'jenis_kepribadian' => $request->jenis_kepribadian,
            'keterangan' => $request->keterangan,
        ]);

        if ($tipe_belajar) {
            return redirect()
                ->intended('/kelolaPembelajaran')
                ->with([
                    'success' => 'Tipe pembelajaran baru ditambahkan'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    public function edit($id){
        
        $user = User::find(Auth::user()->id);
        $tipe_belajar = TipeBelajar::find($id);
        // dd($kepribadian);
        return view('admin.updatePembelajaran', compact('user'))->with('tipe_belajar', $tipe_belajar);
    }

    public function update(Request $request){
        $tipe_belajar = TipeBelajar::find($request->id);
        // dd($kepribadian);
        $this->validate($request, [
            'kode_belajar' => 'required|string|max:155',
            'kategori' => 'required',
            'keterangan' => 'required'
        ]);
        $tipe_belajar->update($request->all());

        if ($tipe_belajar) {
            return redirect()
                ->intended('/kelolaPembelajaran')
                ->with([
                    'success' => 'Tipe Belajar diupdate'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    public function destroy($id){
        $tipe_belajar = TipeBelajar::find($id);
        $tipe_belajar->delete();
        if ($tipe_belajar) {
            return redirect()
            ->intended('/kelolaPembelajaran')
                ->with([
                    'success' => 'Data has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
        return redirect('/kelolaPembelajaran')->with('success', 'Data has been deleted!');
    }
}
