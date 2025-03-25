<?php

namespace App\Services\Hostsharing;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Process;

class HostsharingScripts
{
    public function __construct(protected string $module)
    {
        $this->where = collect();
        $this->set = collect();
    }

    protected Collection $where;

    protected Collection $set;

    public function execute($function = 'search'): Collection|string
    {
        $user = config('services.hostsharing.user');
        $options = collect()->put('where', $this->where)->put('set', $this->set)->toJson();
        $process = Process::forever()
            ->input(config('services.hostsharing.password'))
            ->run("hsscript -u $user -e \"$this->module.$function($options)\"");
        $result = $process->output();

        return ScriptOutputTransformer::transform($result);
    }

    public function where($filters): static
    {
        $this->where = collect($filters);

        return $this;
    }

    public function set(array $attributes): static
    {
        // could be done with dirty model and save function later idk?
        $this->set = collect($attributes);

        return $this;
    }
}
