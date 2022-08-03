<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataKepribadian;
use Carbon\Carbon;
use App\Models\HasilIdentifikasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DataKeperibadianController extends Controller
{
    public function index(){

        $user = User::find(Auth::user()->id);
        $datakepribadians = DataKepribadian::orderBy('updated_at', 'DESC')->get();
        $harian = HasilIdentifikasi::where('tanggal', Carbon::now()->format('Y-m-d'))->count();
        $bulanan = HasilIdentifikasi::whereDate('created_at','>', Carbon::now()->subMonth())->count();
        $all = HasilIdentifikasi::all()->count();

        return view('admin.dataKepribadian', compact('datakepribadians','user'))
                                    ->with('harian', $harian)
                                    ->with('bulanan', $bulanan)
                                    ->with('all', $all);
    }

    public function indexCreate(){
        
        $user = User::find(Auth::user()->id);
        $datakepribadians = DataKepribadian::orderBy('kategori', 'ASC')->get();
        $harian = HasilIdentifikasi::where('tanggal', Carbon::now()->format('Y-m-d'))->count();
        $bulanan = HasilIdentifikasi::whereDate('created_at','>', Carbon::now()->subMonth())->count();
        $all = HasilIdentifikasi::all()->count();

        return view('admin.createDataKepribadian', compact('datakepribadians','user'))
                                    ->with('harian', $harian)
                                    ->with('bulanan', $bulanan)
                                    ->with('all', $all);
    }

    public function create(Request $request){

        $this->validate($request, [
            'kategori' => 'required',
            'kelebihan' => 'required',
            'kelemahan' => 'required'
        ]);
        

        $datakepribadians = DataKepribadian::create([
            'kategori' => $request->kategori,
            'kelebihan' => $request->kelebihan,
            'kelemahan' => $request->kelemahan,
        ]);

        if ($datakepribadians) {
            return redirect()
                ->intended('/dataKepribadian')
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
        $datakepribadians = DataKepribadian::find($id);
        
        $user = User::find(Auth::user()->id);
        $harian = HasilIdentifikasi::where('tanggal', Carbon::now()->format('Y-m-d'))->count();
        $bulanan = HasilIdentifikasi::whereDate('created_at','>', Carbon::now()->subMonth())->count();
        $all = HasilIdentifikasi::all()->count();
        // dd($kepribadian);
        return view('admin.updateDataKepribadian', compact('user'))
                                ->with('datakepribadians', $datakepribadians)
                                ->with('harian', $harian)
                                ->with('bulanan', $bulanan)
                                ->with('all', $all);
    }

    public function update(Request $request){
        // dd($request->all());
        $datakepribadians = DataKepribadian::find($request->id);
        $this->validate($request, [
            'kategori' => 'required',
            'kelebihan' => 'required',
            'kelemahan' => 'required'
        ]);

        $datakepribadians->update($request->all());

        if ($datakepribadians) {
            return redirect()
                ->intended('/dataKepribadian')
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
        $datakepribadians = DataKepribadian::find($id);
        $datakepribadians->delete();
        if ($datakepribadians) {
            return redirect()
            ->intended('/dataKepribadian')
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
        return redirect('/dataKepribadian')->with('success', 'Data has been deleted!');
    }
}
