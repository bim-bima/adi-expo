<?php

use App\Http\Controllers\backend\ControllerBintangTamu;
use App\Http\Controllers\backend\KegiatanController;
use App\Http\Controllers\backend\LombaController;
use App\Http\Controllers\backend\McController;
use App\Http\Controllers\backend\PendaftarController;
use App\Http\Controllers\backend\scanController;
use App\Http\Controllers\backend\SponsorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InputDaftarController;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class,'landingPage']);
Route::get('/daftar', [HomeController::class,'daftar']);
// Route::post('/daftar', [HomeController::class,'P_daftar']);

Route::post('/admin/verifikasi/{id}',[PendaftarController::class,'verifikasiDaftar']);
Route::get('/dataRegis',[DashboardController::class,'dataRegis']);


Route::get('/daftar-cerdas-cermat', [HomeController::class,'formCerdasCermat']);
Route::get('/daftar-debat-bahasa-inggris', [HomeController::class,'formDebatBahasaInggris']);
Route::get('/daftar-cosplay-coswalk', [HomeController::class,'formDaftarCosplay']);

Route::post('/daftar-cerdas-cermat', [HomeController::class,'CerdasCermat'])->name('daftar.cerdas.cermat');
Route::post('/daftar-debat-bahasa-inggris', [HomeController::class,'DebatBahasaInggris'])->name('daftar.debat.bahasa.inggris');
Route::post('/daftar-cosplay-coswalk-smp', [HomeController::class,'DaftarCosplaySmp'])->name('daftar.cosplay.smp');
Route::post('/daftar-cosplay-coswalk-sma', [HomeController::class,'DaftarCosplaySma'])->name('daftar.cosplay.sma');
Route::post('/daftar-cosplay-coswalk-Umum', [HomeController::class,'DaftarCosplayUmum'])->name('daftar.cosplay.Umum');
Route::post('/daftar-cosplay-coswalk-Alumni', [HomeController::class,'DaftarCosplayAlumni'])->name('daftar.cosplay.Alumni');




Auth::routes();

Route::get('/admin', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

// tamu
Route::get('/admin/tamu',[ControllerBintangTamu::class,'index']);
Route::get('/admin/tamu/add',[ControllerBintangTamu::class,'viewAdd']);
Route::post('addTamu',[ControllerBintangTamu::class,'ActionAdd'])->name('addTamu');
Route::get('/admin/tamu/edit/{id}',[ControllerBintangTamu::class,'viewEdit']);
Route::put('/admin/tamu/edit/{id}',[ControllerBintangTamu::class,'ActionEdit'])->name('editTamu');
Route::delete('/admin/tamu/delete/{id}',[ControllerBintangTamu::class,'delete']);
// end tam


// mc
Route::get('/admin/mc',[McController::class,'index']);
Route::get('/admin/mc/add',[McController::class,'viewAdd']);
Route::post('addmc',[McController::class,'ActionAdd'])->name('addMc');
Route::get('/admin/mc/edit/{id}',[McController::class,'viewEdit']);
Route::put('/admin/mc/edit/{id}',[McController::class,'ActionEdit'])->name('editMc');
Route::delete('/admin/mc/delete/{id}',[McController::class,'delete']);
// end mc

// kegiatan
Route::get('/admin/kegiatan',[KegiatanController::class,'index']);
Route::get('/admin/kegiatan/add',[KegiatanController::class,'viewAdd']);
Route::post('addKegiatan',[KegiatanController::class,'ActionAdd'])->name('addKegiatan');
Route::get('/admin/kegiatan/edit/{id}',[KegiatanController::class,'viewEdit']);
Route::put('/admin/kegiatan/edit/{id}',[KegiatanController::class,'ActionEdit'])->name('editKegiatan');
Route::delete('/admin/kegiatan/delete/{id}',[KegiatanController::class,'delete']);
// end kegiatan

// sponsor
Route::get('/admin/sponsor',[SponsorController::class,'index']);
Route::get('/admin/sponsor/add',[SponsorController::class,'viewAdd']);
Route::post('addSponsor',[SponsorController::class,'ActionAdd'])->name('addSponsor');
Route::delete('/admin/sponsor/delete/{id}',[SponsorController::class,'delete']);
// end sponsor

// lomba
Route::get('/admin/lomba',[LombaController::class,'index']);
Route::get('/admin/lomba/add',[LombaController::class,'viewAdd']);
Route::post('addLomba',[LombaController::class,'ActionAdd'])->name('addLomba');
Route::get('/admin/lomba/edit/{id}',[LombaController::class,'viewEdit']);
Route::put('/admin/lomba/edit/{id}',[LombaController::class,'ActionEdit'])->name('editLomba');
Route::delete('/admin/lomba/delete/{id}',[LombaController::class,'delete']);


Route::get('/admin/input-data-daftar',[InputDaftarController::class,'index']);


Route::get('/admin/pendaftar',[PendaftarController::class,'index']);
Route::delete('/admin/pendaftar/delete/{id}',[PendaftarController::class,'delete']);

Route::get('/admin/scan',[scanController::class,'index']);
Route::post('/validasi',[scanController::class,'validasi'])->name('validasi');

Route::get('/export-exel', [PendaftarController::class,'exel'])->name('exel');


Route::post('import-excel', [PendaftarController::class,'importExcel'])->name('import.excel');









