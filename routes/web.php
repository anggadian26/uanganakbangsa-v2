<?php

use App\Http\Controllers\catatanKeuanganController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IjinController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MasukSaldoController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\RekamKeuanganController;
use App\Http\Controllers\ReqDeleteController;
use App\Http\Controllers\SakitController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\TarikSaldoController;
use App\Http\Controllers\TransaksiNowController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/login', [Controller::class, 'loginShow'])->name('login');
Route::get('login', [Controller::class, 'loginShow'])->name('login');
Route::post('/login-action', [Controller::class, 'loginAction'])->name('login-action');
Route::get('/log-out', [Controller::class, 'logOut'])->name('logOut');

Route::get('/scan', [ScanController::class, 'showScan'])->name('scan-show');
Route::post('/validasi-qrcode', [ScanController::class, 'validasiqrcode'])->name('validasiqrcode');

Route::middleware(['auth'])->group(function () {

    Route::get('/download-qrcode/{barcode}/{info}', [SiswaController::class, 'downloadQrCode'])->name('download-qrcode');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [DashboardAdminController::class, 'index'])->name('welcome');

    // Siswa
    Route::get('/data-siswa', [SiswaController::class, 'showPage'])->name('data-siswa');
    Route::get('/tambah-data-siswa', [SiswaController::class, 'addShowPage'])->name('tambah-siswa');
    Route::post('/add-siswa', [SiswaController::class, 'add_siswa'])->name('add-siswa');

    Route::get('/tabungan-siswa-admin', [TabunganController::class, 'indexAdmin'])->name('tabungan-admin');

    // Penarikan admin
    Route::post('/penarikan-admin', [TabunganController::class, 'penarikanAdmin'])->name('penarikanAdmin');
    Route::post('/pemasukkan-admin', [TabunganController::class, 'pemasukkanAdmin'])->name('pemasukkanAdmin');

    // Rekam Keuangan
    Route::get('/rekam-keuangan', [RekamKeuanganController::class, 'index'])->name('indexRekamKeuangan');
    Route::get('/delete-rekam-keuangan/{id}', [RekamKeuanganController::class, 'delete'])->name('deleteRekamKeuangan');

    Route::get('/transaksi-hari-ini', [TransaksiNowController::class, 'showDataNow'])->name('transaksiNowIndex');

    // Jurusan
    Route::get('/jurusan', [JurusanController::class, 'index'])->name('indexJurusan');
    Route::post('/add-jurusan', [JurusanController::class, 'AddData'])->name('Addjurusan');
    Route::get('/delete-jurusan/{id}', [JurusanController::class, 'deleteData'])->name('deleteJurusan');

    // Request-Delete
    Route::get('/hapus-data-keuangan', [ReqDeleteController::class, 'index'])->name('indexDeleteReq');
    Route::post('/action-delete-req', [ReqDeleteController::class, 'action'])->name('actionDeleteReq');

    // catatan-keuangan
    Route::get('/catatan-keuangan', [catatanKeuanganController::class, 'index'])->name('catatanKeuanganIndex');
});


Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/home', [HomeController::class, 'indexSiswa'])->name('home-siswa');
    Route::get('/tabungan-siswa', [TabunganController::class, 'indexSiswa'])->name('tabunganIndex');
    Route::get('/tarik-saldo', [TarikSaldoController::class, 'indexSiswa'])->name('tariksaldo-siswa');
    Route::post('/tarik-saldo-action', [TarikSaldoController::class, 'tarikSaldoSiswa'])->name('tariksaldo-action');
    Route::get('/success', [TarikSaldoController::class, 'successPage'])->name('success');
});


