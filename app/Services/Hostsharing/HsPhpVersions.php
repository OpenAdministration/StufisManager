<?php

namespace App\Services\Hostsharing;

enum HsPhpVersions : string
{
    case PHP80 = '/usr/lib/cgi-bin/php8.0';
    case PHP81 = '/usr/lib/cgi-bin/php8.1';
    case PHP82 = '/usr/lib/cgi-bin/php8.2';
    case PHP83 = '/usr/lib/cgi-bin/php8.3';
    case PHP84 = '/usr/lib/cgi-bin/php8.4';
}
