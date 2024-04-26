<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProsesKonversi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\PdfToText\Pdf;

class ProsesKonversiController extends Controller
{
    public function showFormTahap1()
    {
        return view('koperasi_proses_konversi');
    }

    public function prosesTahap1(Request $request)
    {
        // Validasi file jika ada
        $request->validate([
            'rapat_anggota' => 'required|file|mimes:pdf|max:2048', // Maksimum 2MB
        ]);

        // Simpan file ke dalam sistem file (contoh: folder "uploads")
        $file = $request->file('rapat_anggota');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads_tahap_1', $fileName);

        // Simpan data proses konversi tahap 1 ke dalam database
        ProsesKonversi::updateOrCreate(
            ['id_koperasi' => Auth::user()->id_koperasi],
            ['rapat_anggota' => $filePath]
        );

        return redirect()->back()->with('success', 'Dokumen rapat anggota berhasil diunggah.');
    }
    

    public function showFormTahap2()
    {
        return view('koperasi_proses_konversi2');
    }

    public function prosesTahap2(Request $request)
    {
        // Validasi file jika ada
        $request->validate([
            'perubahan_pad' => 'required|file|mimes:pdf|max:2048', // Maksimum 2MB
        ]);

        // Simpan file ke dalam sistem file (contoh: folder "uploads")
        $file = $request->file('perubahan_pad');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads_tahap_2', $fileName);

        // Simpan data proses konversi tahap 2 ke dalam database
        ProsesKonversi::updateOrCreate(
            ['id_koperasi' => Auth::user()->id_koperasi],
            ['perubahan_pad' => $filePath]
        );

        return redirect()->back()->with('success', 'Dokumen perubahan PAD berhasil diunggah.');
    }

    public function showFormTahap3()
    {
        return view('koperasi_proses_konversi3');
    }

    public function prosesTahap3(Request $request)
    {
        // Validasi file jika ada
        $request->validate([
            'nama_notaris' => 'required|string|max:255',
            'bukti_notaris' => 'required|file|mimes:png,jpg,jpeg|max:2048', // Maksimum 2MB, dan hanya untuk gambar
        ]);

        // Simpan file ke dalam sistem file (contoh: folder "uploads")
        $file = $request->file('bukti_notaris');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads_tahap_3', $fileName);

        // Simpan data proses konversi tahap 3 ke dalam database
        ProsesKonversi::updateOrCreate(
            ['id_koperasi' => Auth::user()->id_koperasi],
            [
                'nama_notaris' => $request->input('nama_notaris'),
                'bukti_notaris' => $filePath
            ]
        );

        return redirect()->back()->with('success', 'Data nama notaris dan bukti notaris berhasil diunggah.');
    }

    public function showFormTahap4()
    {
        return view('koperasi_proses_konversi4');
    }

    public function prosesTahap4(Request $request)
    {
        // Validasi file jika ada
        $request->validate([
            'pengesahan_pad' => 'required|file|mimes:pdf|max:2048', // Maksimum 2MB
        ]);

        // Simpan file ke dalam sistem file (contoh: folder "uploads")
        $file = $request->file('pengesahan_pad');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads_tahap_4', $fileName);

        // Simpan data proses konversi tahap 4 ke dalam database
        ProsesKonversi::updateOrCreate(
            ['id_koperasi' => Auth::user()->id_koperasi],
            ['pengesahan_pad' => $filePath]
        );

        return redirect()->back()->with('success', 'Dokumen pengesahan PAD berhasil diunggah.');
    }
}
