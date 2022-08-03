<?php

namespace App\Http\Controllers\Pengunjung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengunjung;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DashboardPengunjungController extends Controller
{
    public function index(){
        $user = User::find(Auth::user()->id);
        $pengunjung = Pengunjung::where('user_id',Auth::user()->id)->first();
        return view('pengunjung.dashboard_pengunjung', compact('pengunjung','user'));
    }

    public function profile($id){
        $user = User::where('id',Auth::user()->id)->first();
        $pengunjung = Pengunjung::where('user_id',$id)->first();
        
        return view('pengunjung.datapribadi', compact('pengunjung','user'));
    }

    public function update(Request $request){
        // dd($request->all());
        $user = User::find($request->id);
        $pengunjung = Pengunjung::where('user_id',$request->id)->first();
        // dd($pengunjung);
        $this->validate($request, [
            'username' => 'required|string|max:155',
            'pekerjaan' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);
        
        if (request()->hasFile('foto')){
            $uploadedImage = $request->file('foto');
            $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/pengunjung/');
            $uploadedImage->move('uploads/pengunjung/', $imageName);
        }
        if($request->foto != null){
            if(\File::exists(public_path('uploads/pengunjung/'.$pengunjung->foto))){
                \File::delete(public_path('uploads/pengunjung/'.$pengunjung->foto));
            }
        }
        if($request->foto == null){
            $imageName = $pengunjung->foto;
        }
        
        $pengunjung->update([
            'nama' => $request->username,
            'pekerjaan' => $request->pekerjaan,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telp' => $request->no_telp,
            'nama' => $request->username,
            'alamat' => $request->alamat,
            'foto' => $imageName
        ]);
        
        $user->update([
            'email' => $request->email,
        ]);

        if ($pengunjung) {
            return back()
                ->with([
                    'success' => 'Data diupdate'
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
}
