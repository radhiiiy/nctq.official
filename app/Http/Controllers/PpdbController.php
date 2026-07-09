<?php

namespace App\Http\Controllers;

use App\Models\Ppdb;
use App\Models\Setting;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function index()
    {
        $settings = [
            'ppdb_intro' => Setting::get('ppdb_intro', 'Pendaftaran Santri Baru (PPDB) Pondok Pesantren Nur Cahaya Tarbiyatul Qur\'an Putra dibuka untuk tahun ajaran baru. Silakan lengkapi formulir pendaftaran di bawah ini dengan data yang benar.'),
            'ppdb_syarat' => Setting::get('ppdb_syarat', "1. Beragama Islam dan sanggup mengikuti tata tertib pondok.\n2. Mengisi formulir pendaftaran secara online.\n3. Menyerahkan fotokopi akta kelahiran dan kartu keluarga.\n4. Membayar biaya pendaftaran yang telah ditentukan.\n5. Mengikuti tes seleksi masuk (baca tulis Al-Qur'an dan wawancara)."),
            'ppdb_jadwal' => Setting::get('ppdb_jadwal', 'Gelombang 1: 1 Januari - 28 Februari 2027\nGelombang 2: 1 Maret - 30 April 2027'),
        ];

        return view('site.ppdb', compact('settings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'tempat_lahir' => ['nullable', 'string', 'max:255'],
            'tanggal_lahir' => ['nullable', 'date'],
            'nama_ayah' => ['nullable', 'string', 'max:255'],
            'nama_ibu' => ['nullable', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
            'alamat' => ['required', 'string', 'max:2000'],
            'asal_sekolah' => ['nullable', 'string', 'max:255'],
            'program' => ['nullable', 'string', 'max:255'],
        ]);

        $ppdb = Ppdb::create($validated);

        return redirect()
            ->route('ppdb.index')
            ->with('success', 'Pendaftaran berhasil dikirim. Nomor pendaftaran Anda: '.$ppdb->no_pendaftaran.'. Silakan simpan nomor ini untuk pengecekan status.');
    }
}
