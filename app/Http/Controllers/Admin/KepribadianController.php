<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Identifikasi;
use Carbon\Carbon;
use App\Models\HasilIdentifikasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class KepribadianController extends Controller
{
    public function index(){

        $user = User::find(Auth::user()->id);
        $identifikasis = Identifikasi::orderBy('updated_at', 'DESC')->get();
        $harian = HasilIdentifikasi::where('tanggal', Carbon::now()->format('Y-m-d'))->count();
        $bulanan = HasilIdentifikasi::whereDate('created_at','>', Carbon::now()->subMonth())->count();
        $all = HasilIdentifikasi::all()->count();

        return view('admin.kelolaIdentifikasi', compact('identifikasis','user'))
                                    ->with('harian', $harian)
                                    ->with('bulanan', $bulanan)
                                    ->with('all', $all);
                                                
    }

    public function indexCreate(){
        $user = User::find(Auth::user()->id);
        $identifikasis = Identifikasi::orderBy('id', 'ASC')->get();
        $harian = HasilIdentifikasi::where('tanggal', Carbon::now()->format('Y-m-d'))->count();
        $bulanan = HasilIdentifikasi::whereDate('created_at','>', Carbon::now()->subMonth())->count();
        $all = HasilIdentifikasi::all()->count();

        return view('admin.createIdentifikasi', compact('identifikasis','user'))
                                    ->with('harian', $harian)
                                    ->with('bulanan', $bulanan)
                                    ->with('all', $all);
    }

    public function create(Request $request){

        $this->validate($request, [
            'dominance' => 'required',
            'influence' => 'required',
            'steadiness' => 'required',
            'compliance' => 'required'
        ]);

        $identifikasis = Identifikasi::create([
            'dominance' => $request->dominance,
            'influence' => $request->influence,
            'steadiness' => $request->steadiness,
            'compliance' => $request->compliance,
        ]);
        if ($identifikasis) {
            return redirect()
                ->intended('/kelolaKepribadian')
                ->with([
                    'success' => 'Sifat kepribadian baru ditambahkan'
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
        $identifikasis = Identifikasi::find($id);
        $harian = HasilIdentifikasi::where('tanggal', Carbon::now()->format('Y-m-d'))->count();
        $bulanan = HasilIdentifikasi::whereDate('created_at','>', Carbon::now()->subMonth())->count();
        $all = HasilIdentifikasi::all()->count();
      
        return view('admin.updateIdentifikasi',compact('user'))->with('identifikasis', $identifikasis)
                                    ->with('harian', $harian)
                                    ->with('bulanan', $bulanan)
                                    ->with('all', $all);
    }

    public function update(Request $request){
        $identifikasis = Identifikasi::find($request->id);
 
        $this->validate($request, [
            'dominance' => 'required',
            'influence' => 'required',
            'steadiness' => 'required',
            'compliance' => 'required'
        ]);
        $identifikasis->update($request->all());

        if ($identifikasis) {
            return redirect()
                ->intended('/kelolaKepribadian')
                ->with([
                    'success' => 'Sifat kepribadian diupdate'
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
        $identifikasis = Identifikasi::find($id);
        $identifikasis->delete();
        if ($identifikasis) {
            return redirect()
            ->intended('/kelolaKepribadian')
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
        return redirect('/kelolaKepribadian')->with('success', 'Data has been deleted!');
    }
}
