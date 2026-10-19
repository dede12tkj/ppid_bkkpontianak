<?php

return [

    /*
    | URL website utama BKK Kelas I Pontianak. Dipakai untuk tautan "kembali ke website utama"
    | dan tautan ke halaman yang tetap ada di website utama (WBS, Survei Kepuasan Masyarakat).
    */
    'main_site_url' => rtrim(env('PPID_MAIN_SITE_URL', 'https://bkkpontianak.com'), '/'),

    /*
    | Tautan media sosial (ikon melayang di sisi kanan halaman publik).
    */
    'social' => [
        'facebook' => 'https://www.facebook.com/Admin.KKP.Pontianak',
        'twitter' => 'https://x.com/kkp_pontianak',
        'instagram' => 'https://www.instagram.com/bkk.pontianak/',
        'youtube' => 'https://www.youtube.com/channel/UCXBSuR2BWc9FQ0xRa8G-1rQ/featured',
        'whatsapp' => 'https://api.whatsapp.com/message/4ZTOZITFRHX5G1?autoload=1&app_absent=0',
        'tiktok' => 'https://www.tiktok.com/@bkkpontianak?is_from_webapp=1&sender_device=pc',
    ],
];
