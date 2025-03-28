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
        $domain = (array) $searchResult->first();
        $domainoptions = Arr::pull($domain, 'domainoptions');

        $target_general = [
            'name' => $this->instance->domain,
            'user' => $this->instance->linux_user,
            'fcgiphpbin' => '/usr/lib/cgi-bin/php8.2',
            'validsubdomainnames' => '',
        ];
        $target_options =  [
            'multiviews',
            'letsencrypt',
            'fastcgi',
        ];
        $this->addDiffsAssoc($target_general, $domain);
        $this->addDiffsList('domainoptions', $target_options, $domainoptions);

        return empty($this->diff);

    }
}
