<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LayananKepribadian;
use Carbon\Carbon;
use App\Models\HasilIdentifikasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LayananKepribadianController extends Controller
{
    public function index(){

        $user = User::find(Auth::user()->id);
        $layanans = LayananKepribadian::orderBy('updated_at', 'DESC')->get();
        $harian = HasilIdentifikasi::where('tanggal', Carbon::now()->format('Y-m-d'))->count();
        $bulanan = HasilIdentifikasi::whereDate('created_at','>', Carbon::now()->subMonth())->count();
        $all = HasilIdentifikasi::all()->count();

        return view('admin.layananKepribadian', compact('layanans','user'))
                                    ->with('harian', $harian)
                                    ->with('bulanan', $bulanan)
                                    ->with('all', $all);
    }

    public function indexCreate(){
        
        $user = User::find(Auth::user()->id);
        $layanan = LayananKepribadian::orderBy('jenis_kepribadian', 'ASC')->get();
        $harian = HasilIdentifikasi::where('tanggal', Carbon::now()->format('Y-m-d'))->count();
        $bulanan = HasilIdentifikasi::whereDate('created_at','>', Carbon::now()->subMonth())->count();
        $all = HasilIdentifikasi::all()->count();

        return view('admin.createLayananKepribadian', compact('layanan','user'))
                                    ->with('harian', $harian)
                                    ->with('bulanan', $bulanan)
                                    ->with('all', $all);
    }

    public function create(Request $request){

        $this->validate($request, [
            'jenis_kepribadian' => 'required|string|max:155',
            'keterangan' => 'required'
        ]);
        

        $layanan = LayananKepribadian::create([
            'jenis_kepribadian' => $request->jenis_kepribadian,
            'keterangan' => $request->keterangan,
        ]);

        if ($layanan) {
            return redirect()
                ->intended('/layananKepribadian')
                ->with([
                    'success' => 'Data kepribadian baru ditambahkan'
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
        $layanan = LayananKepribadian::find($id);
        
        $user = User::find(Auth::user()->id);
        $harian = HasilIdentifikasi::where('tanggal', Carbon::now()->format('Y-m-d'))->count();
        $bulanan = HasilIdentifikasi::whereDate('created_at','>', Carbon::now()->subMonth())->count();
        $all = HasilIdentifikasi::all()->count();
        // dd($kepribadian);
        return view('admin.updateLayananKepribadian', compact('user'))
                                ->with('layanan', $layanan)
                                ->with('harian', $harian)
                                ->with('bulanan', $bulanan)
                                ->with('all', $all);
    }

    public function update(Request $request){
        $layanan = LayananKepribadian::find($request->id);
        $this->validate($request, [
            'jenis_kepribadian' => 'required|string|max:155',
            'keterangan' => 'required'
        ]);

        $layanan->update($request->all());

        if ($layanan) {
            return redirect()
                ->intended('/layananKepribadian')
                ->with([
                    'success' => 'Data kepribadian diupdate'
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
        $layanan = LayananKepribadian::find($id);
        $layanan->delete();
        if ($layanan) {
            return redirect()
            ->intended('/layananKepribadian')
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
        return redirect('/layananKepribadian')->with('success', 'Data has been deleted!');
    }
}
