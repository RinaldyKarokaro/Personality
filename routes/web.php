<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\KepribadianController;
use App\Http\Controllers\Admin\KarirController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\LayananKepribadianController;
use App\Http\Controllers\Admin\DataKeperibadianController;
use App\Http\Controllers\Admin\KomentarController;
use App\Http\Controllers\Pengunjung\FaqimileController;
use App\Http\Controllers\Pengunjung\IdentifikasiController;
use App\Http\Controllers\Pengunjung\InfoKepribadianController;
use App\Http\Controllers\Pengunjung\HistoryPengunjungController;


use App\Http\Controllers\Pengunjung\DashboardPengunjungController;
use App\Http\Controllers\Pengunjung\DataPribadiPengunjungController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
});

//Data Kepribadian Identifikasi
Route::get('/dataKepribadian', [DataKeperibadianController::class, 'index'])->middleware('auth');
Route::get('/createDataKepribadian', [DataKeperibadianController::class, 'indexCreate'])->middleware('auth');
Route::get('/updateDataKepribadian/update/{id}', [DataKeperibadianController::class, 'edit'])->middleware('auth');
Route::post('/createDataKepribadian/add', [DataKeperibadianController::class, 'create'])->middleware('auth');
Route::post('/dataKepribadian/delete/{id}', [DataKeperibadianController::class, 'destroy'])->middleware('auth');
Route::post('/dataKepribadian/update', [DataKeperibadianController::class, 'update'])->middleware('auth');


Route::get('/historypengunjung', [HistoryPengunjungController::class, 'index'])->middleware('auth');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//Register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

//diagnosa
// Route::get('/identifikasi', [IdentifikasiController::class, 'index']);
// Route::post('/check', [IdentifikasiController::class, 'check']);
// Route::get('/hasilIdentifikasi', [IdentifikasiController::class, 'hasil']);


//Sifat
Route::get('/kelolaKepribadian', [KepribadianController::class, 'index'])->name('kepribadian')->middleware('auth');
Route::post('/kelolaKepribadian/delete/{id}', [KepribadianController::class, 'destroy'])->middleware('auth');
Route::get('/createKepribadian', [KepribadianController::class, 'indexCreate'])->middleware('auth');
Route::post('/kelolaKepribadian', [KepribadianController::class, 'create'])->middleware('auth');
Route::get('/kelolaKepribadian/edit/{id}', [KepribadianController::class, 'edit'])->middleware('auth');
Route::post('/kelolaKepribadian/update', [KepribadianController::class, 'update'])->middleware('auth');


//Karir
Route::get('/kelolaKarir', [KarirController::class, 'index'])->middleware('auth');
Route::post('/kelolaKarir/delete/{id}', [KarirController::class, 'destroy'])->middleware('auth');
Route::get('/kelolaKarir/add', [KarirController::class, 'indexCreate'])->middleware('auth');
Route::post('/kelolaKarir', [KarirController::class, 'create'])->middleware('auth');
Route::get('/kelolaKarir/edit/{id}', [KarirController::class, 'edit'])->middleware('auth');
Route::post('/kelolaKarir/update', [KarirController::class, 'update'])->middleware('auth');
// Route::get('/kelolaPembelajaran', function () {
//     return view('admin.kelolaPembelajaran');
// });
//History
Route::get('/history', [HistoryController::class, 'index'])->middleware('auth');


//Pengunjung
Route::get('dashboard_pengunjung', [DashboardPengunjungController::class, 'index'])->middleware('auth');
Route::get('/profile_pengunjung/{id}', [DashboardPengunjungController::class, 'profile'])->middleware('auth');
Route::post('/profile_pengunjung/update', [DashboardPengunjungController::class, 'update'])->middleware('auth');



Route::get('/isiDataPribadi', function () {
    return view('pengunjung.isiDataPribadi');
});

// Route::get('/history', function () {
//     return view('admin.history');
// });

Route::get('/profile_admin/{id}', [DashboardController::class, 'profile'])->middleware('auth');
// Route::get('/profile_admin', function () {
//     return view('admin.profile_admin');
// });

//identifikasi
Route::post('/cetak-hasil', [IdentifikasiController::class, 'cetak'])->middleware('auth');
Route::get('/identifikasi', [IdentifikasiController::class, 'index'])->middleware('auth');
Route::post('/identifikasi', [IdentifikasiController::class, 'check'])->middleware('auth');
Route::get('/hasilIdentifikasi', [IdentifikasiController::class, 'hasil'])->name('hasilIdentifikasi')->middleware('auth');

Route::get('/isiDataPribadi', function () {
    return view('pengunjung.isiDataPribadi');
});

Route::get('/kepribadian', [InfoKepribadianController::class, 'index'])->middleware('auth');


// Route::post('/register', [RegisterController::class, 'store'])->middleware('auth');


Route::get('datapribadi', [DataPribadiPengunjungController::class, 'index'])->middleware('auth');


Route::get('/faqimile', [FaqimileController::class, 'index'])->middleware('auth');
Route::post('/faqimile', [FaqimileController::class, 'create'])->middleware('auth');


//Data Kepribadian
Route::get('/layananKepribadian',[LayananKepribadianController::class, 'index'])->middleware('auth');
Route::get('/createLayananKepribadian', [LayananKepribadianController::class, 'indexCreate'])->middleware('auth');
Route::get('/layananKepribadian/update/{id}', [LayananKepribadianController::class, 'edit'])->middleware('auth');
Route::post('/createLayananKepribadian/add', [LayananKepribadianController::class, 'create'])->middleware('auth');
Route::post('/layananKepribadian/delete/{id}', [LayananKepribadianController::class, 'destroy'])->middleware('auth');
Route::post('/layananKepribadian/update', [LayananKepribadianController::class, 'update'])->middleware('auth');

//Komentar
Route::get('/layananPertanyaan', [KomentarController::class, 'index'])->middleware('auth');
Route::get('/balasPertanyaan/{user_id}', [KomentarController::class, 'balas'])->middleware('auth');
Route::post('/balasPertanyaan', [KomentarController::class, 'kirim'])->middleware('auth');

