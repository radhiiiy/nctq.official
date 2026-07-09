<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Article;
use App\Models\KritikSaran;
use App\Models\Ppdb;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'articles' => Article::count(),
            'activities' => Activity::count(),
            'kritik_saran' => KritikSaran::count(),
            'kritik_saran_unread' => KritikSaran::where('is_read', false)->count(),
            'ppdb_total' => Ppdb::count(),
            'ppdb_pending' => Ppdb::where('status', 'pending')->count(),
            'ppdb_diterima' => Ppdb::where('status', 'diterima')->count(),
            'ppdb_ditolak' => Ppdb::where('status', 'ditolak')->count(),
        ];

        $latestPpdb = Ppdb::orderByDesc('created_at')->take(5)->get();
        $latestKritikSaran = KritikSaran::orderByDesc('created_at')->take(5)->get();

        $ppdbChart = Ppdb::selectRaw("
    YEAR(created_at) as tahun,
    MONTH(created_at) as bulan,
    COUNT(*) as jumlah
")
            ->groupBy('tahun', 'bulan')
            ->orderBy('tahun')
            ->orderBy('bulan')
            ->get();

        return view('admin.dashboard', compact('stats', 'latestPpdb', 'latestKritikSaran', 'ppdbChart'));
    }
}
