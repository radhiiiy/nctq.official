<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KritikSaran;
use Illuminate\Http\Request;

class KritikSaranController extends Controller
{
    public function index()
    {
        $items = KritikSaran::orderByDesc('created_at')->paginate(10);

        return view('admin.kritik-saran.index', compact('items'));
    }

    public function show(KritikSaran $kritikSaran)
    {
        if (! $kritikSaran->is_read) {
            $kritikSaran->update(['is_read' => true]);
        }

        return view('admin.kritik-saran.show', ['item' => $kritikSaran]);
    }

    public function destroy(KritikSaran $kritikSaran)
    {
        $kritikSaran->delete();

        return redirect()->route('admin.kritik-saran.index')->with('success', 'Data berhasil dihapus.');
    }
}
