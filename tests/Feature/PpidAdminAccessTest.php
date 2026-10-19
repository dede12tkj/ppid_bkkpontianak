<?php

use App\Models\User;

dataset('halaman_admin', [
    'dashboard' => 'dashboard',
    'formulir' => 'admin-ppid-form.index',
    'faq' => 'admin-ppid-faq.index',
    'profil singkat' => 'admin-ppid-profil.index',
    'tugas fungsi' => 'admin-ppid-tugas-fungsi.index',
    'struktur organisasi' => 'admin-ppid-struktur-organisasi.index',
    'visi misi' => 'admin-ppid-visi-misi.index',
    'regulasi kip' => 'admin-ppid-regulasi-kip.index',
    'regulasi kemenkes' => 'admin-ppid-regulasi-kemenkes.index',
    'regulasi sop' => 'admin-ppid-regulasi-sop-ki.index',
    'standar layanan' => 'admin-ppid-standar-layanan.index',
    'laporan' => 'admin-ppid-laporan.index',
    'informasi berkala' => 'informasi-berkala.index',
    'informasi setiap saat' => 'informasi-setiap-saat.index',
]);

it('mengarahkan tamu ke halaman login', function (string $routeName) {
    $this->get(route($routeName))->assertRedirect(route('login'));
})->with('halaman_admin');

it('membuka halaman admin untuk user yang login', function (string $routeName) {
    $this->actingAs(User::factory()->create())
        ->get(route($routeName))
        ->assertOk();
})->with('halaman_admin');

it('tidak menyediakan registrasi publik', function () {
    $this->get('/register')->assertNotFound();
});
