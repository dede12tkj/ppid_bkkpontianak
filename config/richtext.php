<?php

use App\Models\PPIDFaq;
use App\Models\PPIDProfil;
use App\Models\PPIDTugasFungsi;
use App\Models\PPIDVisiMisi;
use App\Models\SubInformasiPublikBerkala;
use App\Models\SubInformasiPublikSetiapSaat;

return [

    /*
    | Saring HTML dari editor setiap kali data disimpan (script, onclick, javascript: dst dibuang).
    | Matikan sementara bila perlu dengan RICHTEXT_SANITIZE=false di .env
    */
    'enabled' => env('RICHTEXT_SANITIZE', true),

    /*
    | Model => kolom yang berisi HTML dari editor.
    | Tambahkan baris baru di sini bila ada halaman admin baru dengan editor.
    */
    'fields' => [
        PPIDFaq::class => ['deskripsi'],
        PPIDProfil::class => ['text'],
        PPIDTugasFungsi::class => ['text'],
        PPIDVisiMisi::class => ['visi', 'misi'],
        SubInformasiPublikBerkala::class => ['deskripsi'],
        SubInformasiPublikSetiapSaat::class => ['deskripsi'],
    ],
];
