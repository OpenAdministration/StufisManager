<?php

namespace App\Services\Hostsharing;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Process;

class HostsharingScripts {

    public function __construct(protected string $module){}

    protected Collection $where;

    protected Collection $set;

    public function execute($function = 'search') : Collection {
        $user = config('services.hostsharing.user');
        $options = collect()->put('where', $this->where)->put('set', $this->set)->toJson();
        $result = Process::forever()
            ->input(config('services.hostsharing.password'))
            ->run("hsscript -u $user -e \"$this->module.$this->function($options)\"")
            ;
        return collect(json_decode($result, true, 512, JSON_THROW_ON_ERROR));
    }

    public function where($filters) : static {
        $this->where = collect($filters);
        return $this;
    }

    public function set(array $attributes) : static {
        // could be done with dirty model and save function later idk?
        $this->set = collect($attributes);
        return $this;
    }
}
