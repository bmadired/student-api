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
    // ✅ Define all aliases
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => \App\Filters\CorsFilter::class, // custom CORS filter
    ];

    // ✅ No “forcehttps” here
    public array $required = [
        'before' => [],
        'after'  => [],
    ];

    // ✅ Apply CORS globally
    public array $globals = [
        'before' => ['cors'],
        'after'  => ['cors', 'toolbar'],
    ];

    public array $methods = [];
    public array $filters = [];
}
