<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Sengaja kosong: tidak ada akun bawaan (email/password default berbahaya di produksi).
     * Buat admin dengan: php artisan ppid:admin email@contoh.go.id
     */
    public function run(): void
    {
        //
    }
}
