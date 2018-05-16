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
        'http://collector-env-1.2ta8wpyecx.us-east-2.elasticbeanstalk.com/location/store',
        'http://collector-env-1.2ta8wpyecx.us-east-2.elasticbeanstalk.com/keyboard/store',
        'http://collector-env-1.2ta8wpyecx.us-east-2.elasticbeanstalk.com/audio/store'
    ];
}
