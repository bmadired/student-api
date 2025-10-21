<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseFilters
{
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => \App\Filters\CorsFilter::class, // ✅ our custom filter
    ];

    public array $required = [
        'before' => [], // 🚫 no forcehttps here
        'after'  => [],
    ];

    public array $globals = [
        'before' => ['cors'], // ✅ apply CORS globally
        'after'  => ['cors', 'toolbar'],
    ];

    public array $methods = [];
    public array $filters = [];
}
