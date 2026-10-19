<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InformasiPublikBerkala;
use App\Models\InformasiPublikSetiapSaat;
use App\Models\LaporanPPID;
use App\Models\PPIDFaq;
use App\Models\PPIDStandarLayanan;
use App\Models\RegulasiKemenkes;
use App\Models\RegulasiKIP;
use App\Models\RegulasiSopKI;
use App\Models\Visitor;

class DashboardController extends Controller
{
    public function index()
    {
        $stat = [
            'Laporan PPID' => LaporanPPID::count(),
            'FAQ' => PPIDFaq::count(),
            'Standar Layanan' => PPIDStandarLayanan::count(),
            'Regulasi' => RegulasiKIP::count() + RegulasiKemenkes::count() + RegulasiSopKI::count(),
            'Informasi Berkala' => InformasiPublikBerkala::count(),
            'Informasi Setiap Saat' => InformasiPublikSetiapSaat::count(),
        ];

        $today = now()->toDateString();

        return view('pages.backend.dashboard', [
            'stat' => $stat,
            'totalVisitors' => Visitor::count(),
            'todayVisitors' => Visitor::where('visit_date', $today)->count(),
        ]);
    }
}
