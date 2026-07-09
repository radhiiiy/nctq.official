@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-16">
    <div class="text-center mb-14">
        <h2 class="text-4xl sm:text-5xl text-sage-500 font-medium">PPDB</h2>
        <p class="text-gray-400 text-sm mt-2">Penerimaan Peserta Didik Baru</p>
        <div class="w-24 h-0.5 bg-sage-400 mx-auto mt-4"></div>
    </div>

    <p class="text-gray-600 leading-relaxed text-sm sm:text-base mb-12 text-center max-w-3xl mx-auto">
        {{ $settings['ppdb_intro'] }}
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-16">
        <div class="border border-gray-200 rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-3">Syarat Pendaftaran</h3>
            <p class="text-sm text-gray-600 leading-relaxed whitespace-pre-line">{{ $settings['ppdb_syarat'] }}</p>
        </div>
        <div class="border border-gray-200 rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-3">Jadwal Pendaftaran</h3>
            <p class="text-sm text-gray-600 leading-relaxed whitespace-pre-line">{{ $settings['ppdb_jadwal'] }}</p>
        </div>
    </div>

    <h3 class="text-xl sm:text-2xl text-sage-500 font-medium mb-6">Formulir Pendaftaran Santri Baru</h3>

    <form action="{{ route('ppdb.store') }}" method="POST" class="border border-gray-300 rounded-2xl p-8 sm:p-10 space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2" for="nama_lengkap">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}"
                       class="w-full border border-gray-200 rounded-xl px-5 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300 @error('nama_lengkap') border-red-400 @enderror">
                @error('nama_lengkap') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2" for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin"
                        class="w-full border border-gray-200 rounded-xl px-5 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300 @error('jenis_kelamin') border-red-400 @enderror">
                    <option value="">Pilih</option>
                    <option value="Laki-laki" @selected(old('jenis_kelamin') == 'Laki-laki')>Laki-laki</option>
                    <option value="Perempuan" @selected(old('jenis_kelamin') == 'Perempuan')>Perempuan</option>
                </select>
                @error('jenis_kelamin') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2" for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}"
                       class="w-full border border-gray-200 rounded-xl px-5 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2" for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                       class="w-full border border-gray-200 rounded-xl px-5 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2" for="nama_ayah">Nama Ayah</label>
                <input type="text" name="nama_ayah" id="nama_ayah" value="{{ old('nama_ayah') }}"
                       class="w-full border border-gray-200 rounded-xl px-5 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2" for="nama_ibu">Nama Ibu</label>
                <input type="text" name="nama_ibu" id="nama_ibu" value="{{ old('nama_ibu') }}"
                       class="w-full border border-gray-200 rounded-xl px-5 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2" for="no_hp">No. HP / WhatsApp</label>
                <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}"
                       class="w-full border border-gray-200 rounded-xl px-5 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300 @error('no_hp') border-red-400 @enderror">
                @error('no_hp') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2" for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="w-full border border-gray-200 rounded-xl px-5 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2" for="asal_sekolah">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" id="asal_sekolah" value="{{ old('asal_sekolah') }}"
                       class="w-full border border-gray-200 rounded-xl px-5 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2" for="program">Program Yang Dipilih</label>
                <select name="program" id="program"
                        class="w-full border border-gray-200 rounded-xl px-5 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300">
                    <option value="">Pilih Program</option>
                    <option value="Tahfidz" @selected(old('program') == 'Tahfidz')>Tahfidz</option>
                    <option value="Reguler" @selected(old('program') == 'Reguler')>Reguler</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-800 mb-2" for="alamat">Alamat Lengkap</label>
            <textarea name="alamat" id="alamat" rows="4" placeholder="Alamat lengkap...."
                      class="w-full border border-gray-200 rounded-xl px-5 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-sage-300 @error('alamat') border-red-400 @enderror">{{ old('alamat') }}</textarea>
            @error('alamat') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-sage-500 hover:bg-sage-600 text-white px-10 py-3 rounded-xl font-medium transition">
                Daftar Sekarang
            </button>
        </div>
    </form>
</div>
@endsection
