<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://161.53.64.201:8080/collector/location/store',
        'http://161.53.64.201:8080/collector/keyboard/store',
        'http://161.53.64.201:8080/collector/audio/store'
    ];
}
