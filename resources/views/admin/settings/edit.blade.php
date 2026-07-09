@extends('layouts.admin')
@php $title = 'Pengaturan Konten'; @endphp

@section('content')
<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8 max-w-4xl">
    @csrf

    <div class="bg-white border border-gray-200 rounded-2xl p-8">
        <h3 class="font-semibold text-gray-900 mb-5">Beranda &ndash; Hero</h3>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2">Judul Utama</label>
                <input type="text" name="hero_title_1" value="{{ old('hero_title_1', $settings['hero_title_1']) }}"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2">Sub Judul</label>
                <input type="text" name="hero_title_2" value="{{ old('hero_title_2', $settings['hero_title_2']) }}"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2">Deskripsi Singkat</label>
                <textarea name="hero_text" rows="3" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">{{ old('hero_text', $settings['hero_text']) }}</textarea>
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl p-8">
        <h3 class="font-semibold text-gray-900 mb-5">Beranda &ndash; Sambutan Pengasuh</h3>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2">Nama Pengasuh</label>
                <input type="text" name="sambutan_nama" value="{{ old('sambutan_nama', $settings['sambutan_nama']) }}"
                       class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2">Isi Sambutan</label>
                <textarea name="sambutan_isi" rows="4" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">{{ old('sambutan_isi', $settings['sambutan_isi']) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2">Foto Pengasuh</label>
                <input type="file" name="sambutan_foto" accept="image/*" class="text-sm">
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl p-8">
        <h3 class="font-semibold text-gray-900 mb-5">Profil &ndash; Sejarah Pondok</h3>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2">Paragraf 1</label>
                <textarea name="sejarah_teks_1" rows="4" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">{{ old('sejarah_teks_1', $settings['sejarah_teks_1']) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2">Paragraf 2</label>
                <textarea name="sejarah_teks_2" rows="4" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">{{ old('sejarah_teks_2', $settings['sejarah_teks_2']) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2">Foto Sejarah</label>
                <input type="file" name="sejarah_foto" accept="image/*" class="text-sm">
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl p-8">
        <h3 class="font-semibold text-gray-900 mb-5">Profil &ndash; Visi, Misi &amp; Statistik</h3>
        <div class="space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-800 mb-2">Visi</label>
                    <textarea name="visi" rows="3" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">{{ old('visi', $settings['visi']) }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-800 mb-2">Misi</label>
                    <textarea name="misi" rows="3" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">{{ old('misi', $settings['misi']) }}</textarea>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-800 mb-2">Tahun Berdiri</label>
                    <input type="text" name="tahun_berdiri" value="{{ old('tahun_berdiri', $settings['tahun_berdiri']) }}"
                           class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-800 mb-2">Santri Aktif</label>
                    <input type="text" name="santri_aktif" value="{{ old('santri_aktif', $settings['santri_aktif']) }}"
                           class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-800 mb-2">Dewan Guru</label>
                    <input type="text" name="dewan_guru" value="{{ old('dewan_guru', $settings['dewan_guru']) }}"
                           class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl p-8">
        <h3 class="font-semibold text-gray-900 mb-5">Halaman PPDB</h3>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2">Pengantar</label>
                <textarea name="ppdb_intro" rows="3" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">{{ old('ppdb_intro', $settings['ppdb_intro']) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2">Syarat Pendaftaran</label>
                <textarea name="ppdb_syarat" rows="5" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">{{ old('ppdb_syarat', $settings['ppdb_syarat']) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2">Jadwal Pendaftaran</label>
                <textarea name="ppdb_jadwal" rows="3" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">{{ old('ppdb_jadwal', $settings['ppdb_jadwal']) }}</textarea>
            </div>
        </div>
    </div>

    <button type="submit" class="bg-sage-500 hover:bg-sage-600 text-white px-10 py-3 rounded-xl text-sm transition">
        Simpan Semua Pengaturan
    </button>
</form>
@endsection
