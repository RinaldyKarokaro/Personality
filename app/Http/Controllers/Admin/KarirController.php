<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karir;
use Carbon\Carbon;
use App\Models\HasilIdentifikasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class KarirController extends Controller
{
    public function index(){

        $user = User::find(Auth::user()->id);
        $karir = Karir::orderBy('updated_at', 'DESC')->get();
        $harian = HasilIdentifikasi::where('tanggal', Carbon::now()->format('Y-m-d'))->count();
        $bulanan = HasilIdentifikasi::whereDate('created_at','>', Carbon::now()->subMonth())->count();
        $all = HasilIdentifikasi::all()->count();

        return view('admin.kelolaKarir', compact('karir','user'))
                                    ->with('harian', $harian)
                                    ->with('bulanan', $bulanan)
                                    ->with('all', $all);
                                                
    }

    public function indexCreate(){
        $user = User::find(Auth::user()->id);
        $karir = Karir::orderBy('kategori', 'ASC')->get();
        $harian = HasilIdentifikasi::where('tanggal', Carbon::now()->format('Y-m-d'))->count();
        $bulanan = HasilIdentifikasi::whereDate('created_at','>', Carbon::now()->subMonth())->count();
        $all = HasilIdentifikasi::all()->count();

        return view('admin.createKarir', compact('karir','user'))
                                    ->with('harian', $harian)
                                    ->with('bulanan', $bulanan)
                                    ->with('all', $all);
    }

    public function create(Request $request){

        $this->validate($request, [
            'karir' => 'required|string|max:155',
            'kategori' => 'required'
        ]);
        

        $karir = Karir::create([
            'karir' => $request->karir,
            'kategori' => $request->kategori,
        ]);

        if ($karir) {
            return redirect()
                ->intended('/kelolaKarir')
                ->with([
                    'success' => 'data baru ditambahkan'
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
        $karir = Karir::find($id);
        $harian = HasilIdentifikasi::where('tanggal', Carbon::now()->format('Y-m-d'))->count();
        $bulanan = HasilIdentifikasi::whereDate('created_at','>', Carbon::now()->subMonth())->count();
        $all = HasilIdentifikasi::all()->count();
        return view('admin.updateKarir',compact('user'))->with('karir', $karir)
                                    ->with('harian', $harian)
                                    ->with('bulanan', $bulanan)
                                    ->with('all', $all);
    }

    public function update(Request $request){
        $karir = Karir::find($request->id);
        
        $this->validate($request, [
            'karir' => 'required',
            'kategori' => 'required'
        ]);

        $karir->update($request->all());

        if ($karir) {
            return redirect()
                ->intended('/kelolaKarir')
                ->with([
                    'success' => 'data diupdate'
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
        $karir = Karir::find($id);
        $karir->delete();
        if ($karir) {
            return redirect()
            ->intended('/kelolaKarir')
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
        return redirect('/kelolaKarir')->with('success', 'Data has been deleted!');
    }
}
