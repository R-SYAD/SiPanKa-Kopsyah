<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminProvinsiLoginController;
use App\Http\Controllers\AdminProvinsiController;
use App\Http\Controllers\AdminProvinsiManajemenKabKota;



Route::get('/admin_provinsi_dashboard', function () {
    return view('admin_provinsi_dashboard');

});

Route::get('/admin_provinsi/dashboard', [AdminProvinsiController::class, 'showDashboard'])
    ->name('dashboardAdminProvinsi');

Route::get('/admin/provinsi/manajemenkabkota', [AdminProvinsiManajemenKabKota::class, 'manajemenKabKota'])
->name('admin_provinsi.login');

Route::get('/admin/provinsi/manajemenkabkota', [AdminProvinsiManajemenKabKota::class, 'manajemenKabKota'])
    ->name('manajemenKabKota');

Route::view('/admin-dps', 'admin_provinsi_admindps')->name('manajemenKabKota');

Route::view('/admin-dps', 'admin_provinsi_admindps')->name('admindps');

Route::view('/pengawasan-dps', 'admin_provinsi_pengawasandps')->name('pengawasandps');

Route::view('/admin-koperasi', 'admin_provinsi_adminkoperasi')->name('adminkoperasi');

Route::view('/konversi-koperasi', 'admin_provinsi_konversikoperasi')->name('konversikoperasi');

Route::view('/detail-dps', 'detail_pengawasan_dps')->name('detail_pengawasan_dps');

Route::view('/detail-pengawasankoperasi', 'detail_pengawasandps_koperasi')->name('detailkoperasi');

Route::view('/detail-dpsditolak', 'detail_pengawasan_dpsditolak')->name('detail_dpsditolak');

Route::view('/detail-dpsditerima', 'detail_pengawasan_dpsditerima')->name('detail_dpsditerima');

Route::view('/detail-dpsmenunggu', 'detail_pengawasan_dpsmenunggu')->name('detail_dpsmenunggu');

Route::view('/konversi-tahap1', 'konversi_koperasi_tahap1')->name('konversi_tahap1');

Route::view('/konversi-tahap2', 'konversi_koperasi_tahap2')->name('konversi_tahap2');

Route::view('/konversi-tahap3', 'konversi_koperasi_tahap3')->name('konversi_tahap3');

Route::view('/konversi-tahap4', 'konversi_koperasi_tahap4')->name('konversi_tahap4');

Route::view('/adminkoperasi-detail', 'admin_provinsi_detailadminkoperasi')->name('detail_adminkoperasi');

Route::view('/pengawasan-dps-kabkota', 'admin_kabkota_pengawasandps')->name('pengawasandps_kabkota');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin_provinsi_dashboard');
});

Route::get('/ya', function () {
    return view('admin_provinsi_dashboard');
});


Route::view('/admin_kabkota_dashboard', 'admin_kabkota_dashboard')->name('dashboard_kabkota');

Route::view('/admin_kabkota_pengawasan-dps', 'admin_kabkota_detail_pengawasan_dps')->name('detail_pengawasan_dps_kabkota');

Route::view('/detail-kabkotapengawasankoperasi', 'admin_kabkota_detail_pengawasandps_koperasi')->name('detailkoperasi_kabkota');

Route::view('/detail-kabkota-dpsditerima', 'admin_kabkota_detail_pengawasan_dpsditerima')->name('dps_diterima_kabkota');

Route::view('/detail-kabkota-dpsmenunggu', 'admin_kabkota_detail_pengawasan_dpsmenunggu')->name('dps_menunggu_kabkota');

Route::view('/detail-kabkota-dpsditolak', 'admin_kabkota_detail_pengawasan_dpsditolak')->name('dps_ditolak_kabkota');

Route::view('/admin-koperasi-kabkota', 'admin_kabkota_adminkoperasi')->name('adminkoperasi_kabkota');

Route::view('/konversi-koperasi-kabkota', 'admin_kabkota_koversikoperasi')->name('konversikoperasi_kabkota');

Route::view('/detail-admin-koperasi-kabkota', 'admin_kabkota_detailadminkoperasi')->name('detailadminkoperasi_kabkota');

Route::view('/adminkabkota-konversi-tahap1', 'admin_kabkota_konversi_koperasi_tahap1')->name('kabkota_konversi_tahap1');

Route::view('/adminkabkota-konversi-tahap2', 'admin_kabkota_konversi_koperasi_tahap2')->name('kabkota_konversi_tahap2');

Route::view('/adminkabkota-konversi-tahap3', 'admin_kabkota_konversi_koperasi_tahap3')->name('kabkota_konversi_tahap3');

Route::view('/adminkabkota-konversi-tahap4', 'admin_kabkota_konversi_koperasi_tahap4')->name('kabkota_konversi_tahap4');

Route::view('/login', 'admin_login')->name('login');