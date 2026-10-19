# Website PPID BKK Kelas I Pontianak

Project Laravel 12 mandiri (PPID dipisah dari website utama). Publik + panel admin PPID.
Tanpa npm/Vite: cukup `composer install`.

## 1. Pasang di server (subdomain baru)
1. Buat subdomain (mis. `ppid.bkkpontianak.com`), **document root diarahkan ke folder `public/`**.
2. Upload project, lalu: `composer install --no-dev --optimize-autoloader`
3. `cp .env.example .env`, isi `APP_URL`, `DB_*`, lalu `php artisan key:generate`
4. `php artisan migrate --force`
5. `php artisan storage:link`
6. Buat admin: `php artisan ppid:admin email@contoh.go.id` (juga dipakai untuk reset password)
7. `php artisan config:cache && php artisan route:cache && php artisan view:cache`

Login admin: `https://ppid.bkkpontianak.com/login`

## 2. Pindahkan data & file dari website lama
**Database** (jalankan SETELAH migrate; dari database lama, hanya tabel PPID):
```
mysqldump -u USER -p --no-create-info DB_LAMA \
  form_ppid faq_ppid profil_singkat_ppid tugas_fungsi_ppid struktur_organisasi_ppid \
  visi_misi_ppid regulasi_kip_ppid regulasi_kemenkes_ppid sop_ki_ppid \
  standar_layanan_ppid laporan_ppid informasi_publik_berkala \
  sub_informasi_publik_berkala informasi_publik_setiap_saat \
  sub_informasi_publik_setiap_saat > data_ppid.sql
mysql -u USER -p DB_BARU < data_ppid.sql
```
(Tabel `visitors` boleh diabaikan kalau counter mau mulai dari nol.)

**File** (dari project lama ke project baru):
- `storage/app/public/*` -> `storage/app/public/` (upload admin)
- `public/frontend/img/ppid/` -> `public/frontend/img/ppid/` (PDF Informasi Berkala; TIDAK ada di zip)

## 3. Redirect dari website lama
Tempel di `routes/web.php` project LAMA, paling atas setelah `use`, lalu hapus route/controller PPID lama kalau sudah yakin:
```php
Route::permanentRedirect('/informasi-publik/ppid', 'https://ppid.bkkpontianak.com');
Route::get('/informasi-publik/ppid/{path}', fn ($path) => redirect('https://ppid.bkkpontianak.com/'.$path, 301))->where('path', '.*');
Route::get('/admin-ppid-{path}', fn ($path) => redirect('https://ppid.bkkpontianak.com/admin-ppid-'.$path, 301))->where('path', '.*');
```
Catatan: URL baru tanpa prefix lama, jadi `/informasi-publik/ppid/profil/singkat` -> `/profil/singkat`
(kalau mau persis, ganti baris ke-2 dengan peta manual). Sesuaikan juga link menu "PPID" di navbar website lama.

## Perbedaan dari project lama
- URL publik bersih: `/`, `/profil`, `/regulasi`, `/standar-layanan`, `/informasi-publik`, `/laporan` (nama route `ppid.*` tetap).
- Tidak ada registrasi/forgot-password. Session & cache pakai file.
- Fix: halaman prosedur standar layanan yang tertimpa rute `{id}`, tombol edit Informasi Berkala, validasi `mimes`.

Test: `php artisan test` (belum pernah dijalankan di sini, PHP tidak tersedia saat project ini disusun).
