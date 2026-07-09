<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    private array $keys = [
        'hero_title_1', 'hero_title_2', 'hero_text',
        'sambutan_nama', 'sambutan_isi',
        'sejarah_teks_1', 'sejarah_teks_2',
        'visi', 'misi',
        'tahun_berdiri', 'santri_aktif', 'dewan_guru',
        'ppdb_intro', 'ppdb_syarat', 'ppdb_jadwal',
    ];

    public function edit()
    {
        $settings = [];
        foreach ($this->keys as $key) {
            $settings[$key] = Setting::get($key);
        }

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'hero_title_1' => ['nullable', 'string', 'max:255'],
            'hero_title_2' => ['nullable', 'string', 'max:255'],
            'hero_text' => ['nullable', 'string', 'max:2000'],
            'sambutan_nama' => ['nullable', 'string', 'max:255'],
            'sambutan_isi' => ['nullable', 'string', 'max:3000'],
            'sambutan_foto' => ['nullable', 'image', 'max:2048'],
            'sejarah_teks_1' => ['nullable', 'string', 'max:3000'],
            'sejarah_teks_2' => ['nullable', 'string', 'max:3000'],
            'sejarah_foto' => ['nullable', 'image', 'max:2048'],
            'visi' => ['nullable', 'string', 'max:2000'],
            'misi' => ['nullable', 'string', 'max:2000'],
            'tahun_berdiri' => ['nullable', 'string', 'max:10'],
            'santri_aktif' => ['nullable', 'string', 'max:10'],
            'dewan_guru' => ['nullable', 'string', 'max:10'],
            'ppdb_intro' => ['nullable', 'string', 'max:3000'],
            'ppdb_syarat' => ['nullable', 'string', 'max:3000'],
            'ppdb_jadwal' => ['nullable', 'string', 'max:2000'],
        ]);

        foreach ($this->keys as $key) {
            if (array_key_exists($key, $validated)) {
                Setting::set($key, $validated[$key]);
            }
        }

        if ($request->hasFile('sambutan_foto')) {
            Setting::set('sambutan_foto', $request->file('sambutan_foto')->store('settings', 'public'));
        }

        if ($request->hasFile('sejarah_foto')) {
            Setting::set('sejarah_foto', $request->file('sejarah_foto')->store('settings', 'public'));
        }

        return back()->with('success', 'Pengaturan konten berhasil disimpan.');
    }
}
