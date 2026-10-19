<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InformasiPublikBerkalaController;
use App\Http\Controllers\Admin\InformasiPublikSetiapSaatController;
use App\Http\Controllers\Admin\PPIDFaqController;
use App\Http\Controllers\Admin\PPIDFormController;
use App\Http\Controllers\Admin\PPIDLaporanController;
use App\Http\Controllers\Admin\PPIDProfilController;
use App\Http\Controllers\Admin\PPIDRegulasiKemenkesController;
use App\Http\Controllers\Admin\PPIDRegulasiKIPController;
use App\Http\Controllers\Admin\PPIDSopKIController;
use App\Http\Controllers\Admin\PPIDStandarLayananController;
use App\Http\Controllers\Admin\PPIDStrukturOrganisasiController;
use App\Http\Controllers\Admin\PPIDTugasFungsiController;
use App\Http\Controllers\Admin\PPIDVisiMisiController;
use App\Http\Controllers\Admin\SubInformasiPublikBerkalaController;
use App\Http\Controllers\Admin\SummernoteController;
use App\Models\InformasiPublikBerkala;
use App\Models\InformasiPublikSetiapSaat;
use App\Models\LaporanPPID;
use App\Models\PPIDFaq;
use App\Models\PPIDForm;
use App\Models\PPIDProfil;
use App\Models\PPIDStandarLayanan;
use App\Models\PPIDStrukturOrganisasi;
use App\Models\PPIDTugasFungsi;
use App\Models\PPIDVisiMisi;
use App\Models\RegulasiKemenkes;
use App\Models\RegulasiKIP;
use App\Models\RegulasiSopKI;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Website PPID (publik)
|--------------------------------------------------------------------------
| Nama route (ppid.*) sengaja dipertahankan sama dengan project lama supaya
| semua view tetap jalan. Yang berubah hanya URL-nya: tidak lagi diawali
| /informasi-publik/ppid, karena sekarang PPID punya domain sendiri.
*/

Route::get('/', function () {
    $faq = PPIDFaq::latest()->get();
    $form = PPIDForm::latest()->first();

    return view('pages.frontend.ppid.beranda', compact('faq', 'form'));
})->name('ppid');

// ---- Profil PPID ----
Route::get('/profil', fn () => view('pages.frontend.ppid.profil'))->name('ppid.profil');

Route::get('/profil/singkat', function () {
    $profil = PPIDProfil::latest()->first();

    return view('components.ppid.profil-singkat', compact('profil'));
})->name('ppid.profil-singkat');

Route::get('/profil/tugas-fungsi', function () {
    $profil = PPIDTugasFungsi::latest()->first();

    return view('components.ppid.tugas-fungsi', compact('profil'));
})->name('ppid.tugas-fungsi');

Route::get('/profil/struktur-organisasi', function () {
    $struktur = PPIDStrukturOrganisasi::latest()->get();

    return view('components.ppid.struktur-organisasi', compact('struktur'));
})->name('ppid.struktur-organisasi');

Route::get('/profil/visi-misi', function () {
    $data = PPIDVisiMisi::latest()->first();

    return view('components.ppid.visi-misi', compact('data'));
})->name('ppid.visi-misi');

// ---- Regulasi ----
Route::get('/regulasi', fn () => view('pages.frontend.ppid.regulasi'))->name('ppid.regulasi');

Route::get('/regulasi/kip', function () {
    $data = RegulasiKIP::latest()->get();

    return view('components.ppid.regulasi.kip', compact('data'));
})->name('ppid.regulasi.kip');

Route::get('/regulasi/kemenkes', function () {
    $data = RegulasiKemenkes::latest()->get();

    return view('components.ppid.regulasi.kemenkes', compact('data'));
})->name('ppid.regulasi.kemenkes');

Route::get('/regulasi/sop-ki', function () {
    $data = RegulasiSopKI::latest()->get();

    return view('components.ppid.regulasi.sop', compact('data'));
})->name('ppid.regulasi.sop');

// ---- Standar Layanan ----
Route::get('/standar-layanan', function () {
    $standarLayanan = PPIDStandarLayanan::all();

    return view('pages.frontend.ppid.standar-layanan', compact('standarLayanan'));
})->name('ppid.standar-layanan');

Route::get('/standar-layanan/prosedur-permintaan-informasi', fn () => view('components.ppid.standar-layanan.prosedur-permintaan-informasi'))
    ->name('ppid.standar-layanan.prosedur-permintaan-informasi');

Route::get('/standar-layanan/prosedur-pengajuan-keberatan', fn () => view('components.ppid.standar-layanan.prosedur-pengajuan-keberatan'))
    ->name('ppid.standar-layanan.prosedur-pengajuan-keberatan');

Route::get('/standar-layanan/prosedur-pemohonan-penyelesaian-sengketa-informasi-publik', fn () => view('components.ppid.standar-layanan.prosedur-pemohonan-penyelesaian-sengketa-informasi-publik'))
    ->name('ppid.standar-layanan.prosedur-pemohonan-penyelesaian-sengketa-informasi-publik');

Route::get('/standar-layanan/prosedur-waktu-layanan-informasi', fn () => view('components.ppid.standar-layanan.waktu-layanan-informasi'))
    ->name('ppid.standar-layanan.prosedur-waktu-layanan-informasi');

Route::get('/standar-layanan/standar-biaya-perolehan-informasi', fn () => view('components.ppid.standar-layanan.standar-biaya-perolehan-informasi'))
    ->name('ppid.standar-layanan.standar-biaya-perolehan-informasi');

// Rute dinamis ditaruh PALING BAWAH dan dibatasi angka, supaya tidak menelan
// URL statis di atas (di project lama, {id} berada di atas sehingga 4 halaman
// prosedur di bawahnya tidak pernah terbuka).
Route::get('/standar-layanan/{id}', function ($id) {
    $data = PPIDStandarLayanan::findOrFail($id);

    return view('components.ppid.standar-layanan.detail', compact('data'));
})->whereNumber('id')->name('ppid.standar-layanan.detail');

// ---- Informasi Publik ----
Route::get('/informasi-publik', fn () => view('pages.frontend.ppid.informasi-publik'))->name('ppid.informasi-publik');

Route::get('/informasi-publik/berkala', function () {
    $data = InformasiPublikBerkala::with('sub')->get();

    return view('components.ppid.informasi-publik.ipb', compact('data'));
})->name('ppid.informasi-publik.ipb');

Route::get('/informasi-publik/tersedia-setiap-saat', function () {
    $data = InformasiPublikSetiapSaat::with('sub')->get();

    return view('components.ppid.informasi-publik.iptss', compact('data'));
})->name('ppid.informasi-publik.iptss');

Route::get('/informasi-publik/serta-merta', fn () => view('components.ppid.informasi-publik.ipsm'))
    ->name('ppid.informasi-publik.ipsm');

// ---- Laporan ----
Route::get('/laporan', fn () => view('pages.frontend.ppid.laporan'))->name('ppid.laporan');

Route::get('/laporan/tahunan-layanan-ppid', function () {
    $data = LaporanPPID::orderBy('tahun', 'desc')
        ->orderBy('semester', 'desc')
        ->get();

    return view('components.ppid.laporan.ltlp', compact('data'));
})->name('ppid.laporan.ltlp');

Route::get('/laporan/ringkasan-akses-informasi-publik', fn () => view('components.ppid.laporan.raip'))
    ->name('ppid.laporan.raip');

/*
|--------------------------------------------------------------------------
| Panel admin PPID
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/summernote/upload', [SummernoteController::class, 'upload'])->name('summernote.upload');

    Route::resource('admin-ppid-form', PPIDFormController::class);
    Route::resource('admin-ppid-faq', PPIDFaqController::class);
    Route::resource('admin-ppid-profil', PPIDProfilController::class);
    Route::resource('admin-ppid-tugas-fungsi', PPIDTugasFungsiController::class);
    Route::resource('admin-ppid-struktur-organisasi', PPIDStrukturOrganisasiController::class);
    Route::resource('admin-ppid-visi-misi', PPIDVisiMisiController::class);
    Route::resource('admin-ppid-regulasi-kip', PPIDRegulasiKIPController::class);
    Route::resource('admin-ppid-regulasi-kemenkes', PPIDRegulasiKemenkesController::class);
    Route::resource('admin-ppid-regulasi-sop-ki', PPIDSopKIController::class);
    Route::resource('admin-ppid-standar-layanan', PPIDStandarLayananController::class);
    Route::resource('admin-ppid-laporan', PPIDLaporanController::class);

    // Informasi Publik Berkala (induk + sub)
    Route::get('/admin/informasi-berkala', [InformasiPublikBerkalaController::class, 'index'])->name('informasi-berkala.index');
    Route::post('/admin/informasi-berkala/store', [InformasiPublikBerkalaController::class, 'store'])->name('informasi-berkala.store');
    Route::put('/admin/informasi-berkala/{id}', [InformasiPublikBerkalaController::class, 'update'])->name('informasi-berkala.update');
    Route::delete('/admin/informasi-berkala/{id}', [InformasiPublikBerkalaController::class, 'destroy'])->name('informasi-berkala.destroy');

    Route::post('/admin/informasi-berkala/sub/store', [SubInformasiPublikBerkalaController::class, 'store'])->name('informasi-berkala.sub.store');
    Route::put('/admin/informasi-berkala/sub/{id}', [SubInformasiPublikBerkalaController::class, 'update'])->name('informasi-berkala.sub.update');
    Route::delete('/admin/informasi-berkala/sub/{id}', [SubInformasiPublikBerkalaController::class, 'destroy'])->name('informasi-berkala.sub.destroy');

    // Informasi Publik Tersedia Setiap Saat (induk + sub)
    Route::get('/admin/informasi-setiap-saat', [InformasiPublikSetiapSaatController::class, 'index'])->name('informasi-setiap-saat.index');
    Route::post('/admin/informasi-setiap-saat/store', [InformasiPublikSetiapSaatController::class, 'store'])->name('informasi-setiap-saat.store');
    Route::put('/admin/informasi-setiap-saat/update/{id}', [InformasiPublikSetiapSaatController::class, 'update'])->name('informasi-setiap-saat.update');
    Route::delete('/admin/informasi-setiap-saat/delete/{id}', [InformasiPublikSetiapSaatController::class, 'destroy'])->name('informasi-setiap-saat.delete');

    Route::post('/admin/informasi-setiap-saat/sub/store', [InformasiPublikSetiapSaatController::class, 'storeSub'])->name('informasi-setiap-saat-sub.store');
    Route::put('/admin/informasi-setiap-saat/sub/update/{id}', [InformasiPublikSetiapSaatController::class, 'updateSub'])->name('informasi-setiap-saat-sub.update');
    Route::delete('/admin/informasi-setiap-saat/sub/delete/{id}', [InformasiPublikSetiapSaatController::class, 'destroySub'])->name('informasi-setiap-saat-sub.delete');
});

require __DIR__.'/auth.php';
