<?php

namespace App\Http\Controllers;

use App\Models\KritikSaran;
use Illuminate\Http\Request;

class KritikSaranController extends Controller
{
    public function index()
    {
        return view('site.kritik-saran');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['nullable', 'string', 'max:255'],
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string', 'max:5000'],
        ]);

        KritikSaran::create($validated);

        return redirect()
            ->route('kritik-saran.index')
            ->with('success', 'Terima kasih, kritik dan saran Anda telah kami terima.');
    }
}
