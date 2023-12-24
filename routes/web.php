<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IjinController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\SakitController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('app');
    })->name('welcome');
});


