<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ppdb;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function index(Request $request)
    {
        $query = Ppdb::query()->orderByDesc('created_at');

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        if ($request->filled('q')) {
            $q = $request->string('q');
            $query->where(function ($sub) use ($q) {
                $sub->where('nama_lengkap', 'like', "%{$q}%")
                    ->orWhere('no_pendaftaran', 'like', "%{$q}%")
                    ->orWhere('no_hp', 'like', "%{$q}%");
            });
        }

        $ppdbs = $query->paginate(10)->withQueryString();

        return view('admin.ppdb.index', compact('ppdbs'));
    }

    public function show(Ppdb $ppdb)
    {
        return view('admin.ppdb.show', compact('ppdb'));
    }

    public function update(Request $request, Ppdb $ppdb)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,diterima,ditolak'],
            'catatan_admin' => ['nullable', 'string', 'max:2000'],
        ]);

        $ppdb->update($validated);

        return back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    public function destroy(Ppdb $ppdb)
    {
        $ppdb->delete();

        return redirect()->route('admin.ppdb.index')->with('success', 'Data pendaftar berhasil dihapus.');
    }
}
