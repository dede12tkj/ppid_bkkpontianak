<?php

namespace App\Support;

use App\Models\Visitor;
use Illuminate\Support\Facades\Cache;

/**
 * Cache untuk data yang dibaca di setiap halaman publik (counter pengunjung).
 */
class HomeCache
{
    public const KEY_VISITORS = 'layout:visitors:v1';

    /** Memo per-request supaya composer yang dipanggil berkali-kali tidak menyentuh cache store lagi. */
    private static array $memo = [];

    /**
     * Angka counter pengunjung. Di-cache 5 menit (kunci per hari) supaya tidak
     * menjalankan COUNT(*) ke tabel visitors di setiap request.
     */
    public static function visitorCounts(): array
    {
        $today = now()->toDateString();

        return self::$memo['visitors'] ??= Cache::remember(
            self::KEY_VISITORS.':'.$today,
            300,
            fn () => [
                'totalVisitors' => Visitor::count(),
                'todayVisitors' => Visitor::where('visit_date', $today)->count(),
            ]
        );
    }
}
