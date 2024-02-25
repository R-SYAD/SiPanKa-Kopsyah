<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminProvinsiController;
use App\Http\Controllers\AdminKabupatenKotaController;
use App\Http\Controllers\AdminKoperasiController;
use App\Http\Controllers\AdminProvinsiManajemenKabKotaController;
use App\Http\Controllers\AdminProvinsiManajemenDpsController;
use App\Http\Controllers\AdminProvinsiManajemenKoperasiController;
use App\Http\Controllers\AdminKabupatenKotaManajemenKoperasiController;
use App\Http\Controllers\AdminKabupatenKotaKonversiKoperasiController;
use App\Http\Controllers\AdminKabupatenKotaPengawasanDpsController;
use App\Http\Controllers\KoperasiController;
use App\Models\Koperasi;

// Route default, arahkan ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});
// Route untuk halaman login
Route::get('/login', function () {
    return view('login');
})->name('login');


// Proses login
Route::post('/login', [AuthController::class, 'login']);

// Proses logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Route untuk halaman dashboard (untuk semua role)
Route::middleware(['auth:admin_provinsi'])->group(function () {
    Route::get('/dashboardAdminProvinsi', [AdminProvinsiController::class, 'dashboard'])->name('dashboardAdminProvinsi');
    // Route untuk manajemen kabupaten/kota
    Route::get('/admin-provinsi/manajemen-kab-kota', [AdminProvinsiManajemenKabKotaController::class, 'index'])
        ->name('admin_provinsi.manajemen_kab_kota.index');
    Route::post('/admin-provinsi/manajemen-kab-kota', [AdminProvinsiManajemenKabKotaController::class, 'store'])
        ->name('admin_provinsi.manajemen_kab_kota.store');
    Route::delete('/admin-provinsi/manajemen-kab-kota/{id}', [AdminProvinsiManajemenKabKotaController::class, 'destroy'])
        ->name('admin_provinsi.manajemen_kab_kota.destroy');
    Route::get('/admin_provinsi/manajemen_kab_kota/{id}/edit', [AdminProvinsiManajemenKabKotaController::class, 'edit'])
        ->name('admin_provinsi.manajemen_kab_kota.edit');
    Route::put('/admin_provinsi/manajemen_kab_kota/{id}', [AdminProvinsiManajemenKabKotaController::class, 'update'])
        ->name('admin_provinsi.manajemen_kab_kota.update');
    Route::get('/admin_provinsi/get_jumlah_admin_kabupaten_kota', 'AdminProvinsiManajemenKabKotaController@getJumlahAdminKabupatenKota')
        ->name('admin_provinsi.get_jumlah_admin_kabupaten_kota');


    // Route untuk manajemen DPS
    Route::get('/admin-provinsi/manajemen-dps', [AdminProvinsiManajemenDpsController::class, 'index'])
        ->name('admin_provinsi.manajemen_dps.index');
    Route::post('/admin-provinsi/manajemen-dps', [AdminProvinsiManajemenDpsController::class, 'store'])
        ->name('admin_provinsi.manajemen_dps.store');
    Route::delete('/admin-provinsi/manajemen-dps/{id}', [AdminProvinsiManajemenDpsController::class, 'destroy'])
        ->name('admin_provinsi.manajemen_dps.destroy');
    Route::get('/admin-provinsi/manajemen-dps/{id}/edit', [AdminProvinsiManajemenDpsController::class, 'edit'])
        ->name('admin_provinsi.manajemen_dps.edit');
    Route::put('/admin-provinsi/manajemen-dps/{id}', [AdminProvinsiManajemenDpsController::class, 'update'])
        ->name('admin_provinsi.manajemen_dps.update');
    Route::get('/sertifikat/{filename}', function ($filename) {
        $path = storage_path('app/sertifikat/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }
        return response()->file($path);
    })->name('sertifikat.show');

    // Route untuk manajemen Koperasi
    Route::get('/admin-provinsi/manajemen-koperasi', [AdminProvinsiManajemenKoperasiController::class, 'index'])
        ->name('admin_provinsi.manajemen_koperasi.index');
    Route::post('/admin-provinsi/manajemen-koperasi', [AdminProvinsiManajemenKoperasiController::class, 'store'])
        ->name('admin_provinsi.manajemen_koperasi.store');
    Route::delete('/admin-provinsi/manajemen-koperasi/{id}', [AdminProvinsiManajemenKoperasiController::class, 'destroy'])
        ->name('admin_provinsi.manajemen_koperasi.destroy');
    Route::get('/admin-provinsi/manajemen-koperasi/{id}/edit', [AdminProvinsiManajemenKoperasiController::class, 'edit'])
        ->name('admin_provinsi.manajemen_koperasi.edit');
    Route::put('/admin-provinsi/manajemen-koperasi/{id}', [AdminProvinsiManajemenKoperasiController::class, 'update'])
        ->name('admin_provinsi.manajemen_koperasi.update');
    Route::get('/admin-provinsi/detail-manajemen-koperasi/{id}', [AdminProvinsiManajemenKoperasiController::class, 'detail_index'])
        ->name('admin_provinsi.detail_manajemen_koperasi.detail_index');
});

Route::middleware(['auth:admin_kabupatenkota'])->group(function () {
    Route::get('/admin-kabkota/dashboard', [AdminKabupatenKotaController::class, 'dashboard'])
        ->name('admin_kabkota.dashboard');
    Route::get('/admin-kabkota/manajemen-koperasi', [AdminKabupatenKotaManajemenKoperasiController::class, 'index'])
        ->name('admin_kabkota.manajemen_koperasi.index');
    Route::post('/admin-kabkota/manajemen-koperasi/store', [AdminKabupatenKotaManajemenKoperasiController::class, 'store'])
        ->name('admin_kabkota.manajemen_koperasi.store');
    Route::delete('/admin-kabkota/manajemen-koperasi/{id}', [AdminKabupatenKotaManajemenKoperasiController::class, 'destroy'])
        ->name('admin_kabkota.manajemen_koperasi.destroy');
    Route::put('/admin-kabkota/manajemen-koperasi/{id}', [AdminKabupatenKotaManajemenKoperasiController::class, 'update'])
        ->name('admin_kabkota.manajemen_koperasi.update');

    // Route sementara (opsional, bisa dihapus jika tidak digunakan)
    Route::get('/admin-kabkota/konversi-koperasi', [AdminKabupatenKotaKonversiKoperasiController::class, 'index'])
        ->name('admin_kabkota.konversi_koperasi.index');
    Route::get('/admin-kabkota/pengawasan-dps', [AdminKabupatenKotaPengawasanDpsController::class, 'index'])
        ->name('admin_kabkota.pengawasan_dps.index');
});

Route::middleware(['auth:koperasi'])->group(function () {
    Route::get('/koperasi/dashboard', [KoperasiController::class, 'dashboard'])
        ->name('koperasi.dashboard');
});

// Route untuk halaman detail pengawasan DPS
Route::view('/detail-dps', 'detail_pengawasan_dps')
    ->name('detail_pengawasan_dps');

// Route untuk halaman dps yaa
Route::get('/dps-pengawasandps', function () {
    return view('dps_riwayat_pengawasan');
})->name('dps_riwayat_pengawasan');

Route::get('/dps-informasikoperasi', function () {
    return view('dps_informasi_koperasi');
})->name('dps_informasi_koperasi');

Route::get('/dps-konversikoperasi', function () {
    return view('dps_konversi_koperasi');
})->name('dps_konversi_koperasi');

Route::get('/detail-pengawasan-dps', function () {
    return view('dps_detail_pengawasan');
})->name('dps_detail_pengawasan');

Route::middleware(['auth:admin_kabupatenkota'])->group(function () {
    // Sesuaikan dengan controller dan metodenya
    Route::get('/admin_kabkota_dashboard', [AdminKabupatenKotaController::class, 'dashboard'])->name('admin_kabupatenkota.dashboard');
});

Route::get('/kabkota-adminkoperasi', function () {
    return view('admin_kabkota_adminkoperasi');
})->name('adminkoperasikabkota');

Route::get('/adminkablota-pengawasan-dps', function () {
    return view('admin_kabkota_pengawasandps');
})->name('pengawasandpskabkota');

Route::get('/detail-pengawasan-dps', function () {
    return view('admin_kabkota_detail_pengawasan_dps');
})->name('detailpengawasandpskabkota');

Route::get('/detail-kabkotapengawasankoperasi', function () {
    return view('admin_kabkota_detail_pengawasandps_koperasi');
})->name('detailpengawasandpskabkota_koperasi');

Route::get('/detail-kabkota-dpsditerima', function () {
    return view('admin_kabkota_detail_pengawasan_dpsditerima');
})->name('detailpengawasandpskabkota_diterima');

Route::get('/detail-kabkota-dpsmenunggu', function () {
    return view('admin_kabkota_detail_pengawasan_dpsmenunggu');
})->name('detailpengawasandpskabkota_menunggu');

Route::get('/detail-kabkota-dpsditolak', function () {
    return view('admin_kabkota_detail_pengawasan_dpsditolak');
})->name('detailpengawasandpskabkota_ditolak');

Route::get('/detail-admin-koperasi-kabkota', function () {
    return view('admin_kabkota_detailadminkoperasi');
})->name('admin_kabkota_detailadminkoperasi');

// Route::middleware(['auth:dps'])->group(function () {
//     // Sesuaikan dengan controller dan metodenya
//     Route::get('/dps_dashboard', [DpsController::class, 'dashboard'])->name('dps.dashboard');
// });

Route::get('/detail-admin-koperasi-kabkota', function () {
    return view('admin_kabkota_detailadminkoperasi');
})->name('admin_kabkota_detailadminkoperasi');



Route::middleware(['auth:koperasi'])->group(function () {
    Route::get('/dashboardKoperasi', [AdminKoperasiController::class, 'dashboard'])->name('dashboard.koperasi');
    Route::get('/update_profile_koperasi/{id}', [KoperasiController::class, 'update_profile_koperasi'])->name('update_profile_koperasi');
});


Route::get('/dashboard_koperasi', function () {
    return view('koperasi_dashboard');
})->name('koperasi.dashboard');

Route::get('/koperasi-pemilihan-dps', function () {
    return view('koperasi_pemilihan_dps');
})->name('pemilihan.dps');

Route::get('/koperasi-proses-konversi', function () {
    return view('koperasi_proses_konversi');
})->name('proses.konversi.koperasi');

Route::get('/koperasi-hasil-pengawasan', function () {
    return view('koperasi_hasil_pengawasan');
})->name('hasil.pengawasan.koperasi');

Route::get('/koperasi-hasil-pengawasan2', function () {
    return view('koperasi_hasil_pengawasan2');
})->name('hasil.pengawasan.koperasi2');
