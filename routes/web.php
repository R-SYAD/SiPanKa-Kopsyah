<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminProvinsiController;
use App\Http\Controllers\AdminKabupatenKotaController;
use App\Http\Controllers\AdminKoperasiController;
use App\Http\Controllers\AdminProvinsiManajemenKabKotaController;
use App\Http\Controllers\AdminProvinsiManajemenDpsController;
use App\Http\Controllers\ManajemenKoperasiController;
use App\Http\Controllers\DpsController;
use App\Http\Controllers\KoperasiController;
use App\Http\Controllers\AdminProvinsiManajemenKoperasiController;
use App\Http\Controllers\PemilihanDpsController;



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
  Route::get('/admin-provinsi/manajemen-dps/{id}/edit', [AdminProvinsiManajemenDpsController::class, 'edit'])
      ->name('admin_provinsi.manajemen_dps.edit');
      Route::delete('/admin-provinsi/manajemen-dps/{id}', [AdminProvinsiManajemenDpsController::class, 'destroy'])
      ->name('admin_provinsi.manajemen_dps.destroy');
  Route::put('/admin-provinsi/manajemen-dps/{id}', [AdminProvinsiManajemenDpsController::class, 'update'])
      ->name('admin_provinsi.manajemen_dps.update');
  Route::get('/sertifikat/{filename}', function ($filename) {
      $path = storage_path('app/sertifikat/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }
        return response()->file($path);
    })->name('sertifikat.show');
    Route::get('/admin_provinsi/get_jumlah_dps', 'AdminProvinsiManajemenDpsController@getJumlahAdminDps')
        ->name('admin_provinsi.get_jumlah_admin_dps');

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
    Route::get('/admin_provinsi/get_jumlah_koperasi', 'AdminProvinsiManajemenKoperasiController@getJumlahAdminKoperasi')
        ->name('admin_provinsi.get_jumlah_admin_koperasi');
});




    // Route sementara (opsional, bisa dihapus jika tidak digunakan)
    Route::get('/admin-dps', function () {
        return view('admin_provinsi_admindps');
    })->name('admindps');

// Route sementara (opsional, bisa dihapus jika tidak digunakan)
Route::get('/pengawasan-dps', function () {
    return view('admin_provinsi_pengawasandps');
})->name('pengawasandps');

// Route sementara (opsional, bisa dihapus jika tidak digunakan)
Route::get('/konversi-koperasi', function () {
    return view('admin_provinsi_konversiKoperasi');
})->name('konversikoperasi');

Route::get('/detail-pengawasankoperasi', function () {
    return view('detail_pengawasandps_koperasi');
})->name('detail_pengawasandps_koperasi');

Route::get('/detail-dpsditerima', function () {
    return view('detail_pengawasan_dpsditerima');
})->name('detail_pengawasan_dpsditerima');

Route::get('/detail-dpsmenunggu', function () {
    return view('detail_pengawasan_dpsmenunggu');
})->name('detail_pengawasan_dpsmenunggu');

Route::get('/detail-dpsditolak', function () {
    return view('detail_pengawasan_dpsditolak');
})->name('detail_pengawasan_dpsditolak');

Route::get('/konversi-tahap1', function () {
    return view('konversi_koperasi_tahap1');
})->name('konversi_koperasi_tahap1');

Route::get('/konversi-tahap2', function () {
    return view('konversi_koperasi_tahap2');
})->name('konversi_koperasi_tahap2');

Route::get('/konversi-tahap3', function () {
    return view('konversi_koperasi_tahap3');
})->name('konversi_koperasi_tahap3');

Route::get('/konversi-tahap4', function () {
    return view('konversi_koperasi_tahap4');
})->name('konversi_koperasi_tahap4');


// Route sementara untuk kabkota (opsional, bisa dihapus jika tidak digunakan)
Route::get('/konversi-koperasikabkota', function () {
    return view('admin_kabkota_konversikoperasi');
})->name('konversikoperasikabkota');

Route::get('/adminkabkota-konversi-tahap1', function () {
    return view('admin_kabkota_konversi_koperasi_tahap1');
})->name('tahap1_konversikoperasikabkota');

Route::get('/adminkabkota-konversi-tahap2', function () {
    return view('admin_kabkota_konversi_koperasi_tahap2');
})->name('tahap2_konversikoperasikabkota');

Route::get('/adminkabkota-konversi-tahap3', function () {
    return view('admin_kabkota_konversi_koperasi_tahap3');
})->name('tahap3_konversikoperasikabkota');

    Route::get('/adminkabkota-konversi-tahap4', function () {
        return view('admin_kabkota_konversi_koperasi_tahap4');
    })->name('tahap4_konversikoperasikabkota');

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

Route::middleware(['auth:dps'])->group(function () {
    // Sesuaikan dengan controller dan metodenya
    Route::get('/dps_dashboard', [DpsController::class, 'dashboard'])->name('dps.dashboard');
});

Route::get('/detail-admin-koperasi-kabkota', function () {
    return view('admin_kabkota_detailadminkoperasi');
})->name('admin_kabkota_detailadminkoperasi');

Route::middleware(['auth:koperasi'])->group(function () {
    Route::get('/dashboardKoperasi', [AdminKoperasiController::class, 'dashboard'])->name('dashboard.koperasi');
    Route::get('/update_profile_koperasi/{id}', [KoperasiController::class, 'update_profile_koperasi'])->name('koperasi_update_profile.index');
    Route::post('/update_profile_koperasi/{id}', [KoperasiController::class, 'store'])
    ->name('koperasi_update_profile.store');

    Route::get('/pemilihan-dps', [PemilihanDpsController::class, 'index'])->name('pemilihan-dps.index');




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

