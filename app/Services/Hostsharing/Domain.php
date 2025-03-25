<?php

namespace App\Services\Hostsharing;

use Illuminate\Support\Collection;

class Domain
{
    /*
     * Attributes of HS Domain element
     * @see https://www.hostsharing.net/doc/managed-operations-platform/hsadmin/domain/
     */

    public string $name;

    public string $user;

    public string $validsubdomains;

    public array $domainoptions;

    // apache scripting optionen:
    public string $fcgiphpbin;

    public static function create(array $attributes)
    {
        self::query()->set($attributes)->execute('add');
    }

    public function update(array $attributes)
    {
        self::query()
            ->where(['name' => $this->name, 'user' => $this->user])
            ->set($attributes)->execute('update');
    }

    private static function query(): HostsharingScripts
    {
        return new HostsharingScripts('domain');
    }

    public static function search($filter): Collection|string
    {
        return self::query()->where($filter)->execute('search');
    }
}
