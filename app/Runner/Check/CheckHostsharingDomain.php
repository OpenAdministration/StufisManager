<?php

namespace App\Runner\Check;

use App\Runner\Runner;
use App\Services\Hostsharing\Domain;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class CheckHostsharingDomain extends Runner
{
    public string $name = 'check-hostsharing-domain';

    /**
     * @inheritDoc
     */
    protected function action(): bool
    {
        $searchResult = Domain::search(['name' => $this->instance->domain]);

        if (is_string($searchResult)) {
            $this->log = $searchResult;
            return false;
        }
        $domain = Arr::dot((array) $searchResult->first());

        $target = Arr::dot([
            'name' => $this->instance->domain,
            'user' => $this->instance->linux_user,
            'fcgiphpbin' => '/usr/lib/cgi-bin/php8.2',
            'validsubdomainnames' => '',
            'domainoptions' => [
                'multiviews',
                'letsencrypt',
                'fastcgi',
            ],
        ]);

        $diff = array_diff_assoc($target, $domain); // <- not recursive, therfor dot and undot'ing of the arrays :'(

        $this->log = var_export($diff, true);

        return empty($diff);

    }
}
