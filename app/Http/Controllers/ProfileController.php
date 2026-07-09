<?php

namespace App\Http\Controllers;

use App\Models\Setting;

class ProfileController extends Controller
{
    public function index()
    {
        $settings = [
            'sejarah_teks_1' => Setting::get('sejarah_teks_1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
            'sejarah_teks_2' => Setting::get('sejarah_teks_2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
            'sejarah_foto' => Setting::get('sejarah_foto'),
            'visi' => Setting::get('visi', 'Menjadi lembaga pendidikan Al-Qur\'an terdepan yang melahirkan generasi Qur\'ani, berilmu, dan berakhlak mulia.'),
            'misi' => Setting::get('misi', "1. Menyelenggarakan pendidikan tahfidz Al-Qur'an yang berkualitas.\n2. Membina akhlak santri sesuai tuntunan Islam.\n3. Mengembangkan potensi santri secara akademik dan non akademik."),
            'tahun_berdiri' => Setting::get('tahun_berdiri', '1999'),
            'santri_aktif' => Setting::get('santri_aktif', '100'),
            'dewan_guru' => Setting::get('dewan_guru', '100'),
        ];

        return view('site.profile', compact('settings'));
    }
}
