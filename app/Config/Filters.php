<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;

// ⚠️ Remove: "use CodeIgniter\Filters\Cors;" 
// because your CORS filter is custom: App\Filters\CorsFilter

class Filters extends BaseFilters
{
    /**
     * Aliases make filters easier to reference
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => \App\Filters\CorsFilter::class, // ✅ custom CORS filter
        'forcehttps'    => ForceHTTPS::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,
    ];

    /**
     * Required system filters
     */
    public array $required = [
        'before' => [
            //'forcehttps', // optional – enable only if you want HTTPS redirects
            //'pagecache',
        ],
        'after' => [
            //'pagecache',
            //'performance',
            'toolbar',
        ],
    ];

    /**
     * Filters that run before and after all requests
     */
    public array $globals = [
        'before' => [
            'cors', // ✅ ensures CORS headers always load first
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            // 'honeypot',
            // 'secureheaders',
            'toolbar',
        ],
    ];

    /**
     * Filters by HTTP method (optional)
     */
    public array $methods = [];

    /**
     * Filters by route pattern (optional)
     */
    public array $filters = [];
}
