<?php

use App\Models\PPIDStandarLayanan;

/*
| Semua halaman publik harus terbuka (HTTP 200) walaupun database masih kosong.
*/
dataset('halaman_publik', [
    'beranda' => 'ppid',
    'profil' => 'ppid.profil',
    'profil singkat' => 'ppid.profil-singkat',
    'tugas fungsi' => 'ppid.tugas-fungsi',
    'struktur organisasi' => 'ppid.struktur-organisasi',
    'visi misi' => 'ppid.visi-misi',
    'regulasi' => 'ppid.regulasi',
    'regulasi kip' => 'ppid.regulasi.kip',
    'regulasi kemenkes' => 'ppid.regulasi.kemenkes',
    'regulasi sop' => 'ppid.regulasi.sop',
    'standar layanan' => 'ppid.standar-layanan',
    'prosedur permintaan informasi' => 'ppid.standar-layanan.prosedur-permintaan-informasi',
    'prosedur pengajuan keberatan' => 'ppid.standar-layanan.prosedur-pengajuan-keberatan',
    'prosedur sengketa' => 'ppid.standar-layanan.prosedur-pemohonan-penyelesaian-sengketa-informasi-publik',
    'waktu layanan' => 'ppid.standar-layanan.prosedur-waktu-layanan-informasi',
    'biaya perolehan' => 'ppid.standar-layanan.standar-biaya-perolehan-informasi',
    'informasi publik' => 'ppid.informasi-publik',
    'informasi berkala' => 'ppid.informasi-publik.ipb',
    'informasi setiap saat' => 'ppid.informasi-publik.iptss',
    'informasi serta merta' => 'ppid.informasi-publik.ipsm',
    'laporan' => 'ppid.laporan',
    'laporan tahunan' => 'ppid.laporan.ltlp',
    'ringkasan akses' => 'ppid.laporan.raip',
]);

it('membuka halaman publik', function (string $routeName) {
    $this->get(route($routeName))->assertOk();
})->with('halaman_publik');

it('membuka detail standar layanan dan 404 bila tidak ada', function () {
    $item = PPIDStandarLayanan::create([
        'judul' => 'Prosedur Uji',
        'path_judul' => 'standar_layanan_ppid/judul/a.png',
        'path' => 'standar_layanan_ppid/dokumen/a.png',
    ]);

    $this->get(route('ppid.standar-layanan.detail', $item->id))
        ->assertOk()
        ->assertSee('Prosedur Uji');

    $this->get(route('ppid.standar-layanan.detail', 9999))->assertNotFound();
});

it('halaman prosedur statis tidak tertelan rute {id}', function () {
    $this->get('/standar-layanan/prosedur-pengajuan-keberatan')->assertOk();
});
