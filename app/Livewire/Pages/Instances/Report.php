<?php

namespace App\Livewire\Pages\Instances;

use App\Models\Instance;
use App\Models\Report as ReportModel;
use App\Runner\Check\CheckHostsharingDomain;
use Livewire\Component;

class Report extends Component
{
    public $instance;
    private $runner = CheckHostsharingDomain::class;

    public $lastResult;

    public function mount($instance_id)
    {
        $this->instance = Instance::findOrFail($instance_id);
        $this->lastResult = ReportModel::query()->where(['instance_id' => $instance_id])->latest()->first();
    }

    public function run()
    {
        $runner = new $this->runner($this->instance);
        $runner->run();
    }

    public function render()
    {
        return view('livewire.pages.instances.report');
    }
}
