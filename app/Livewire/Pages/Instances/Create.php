<?php

namespace App\Livewire\Pages\Instances;

use App\Models\Instance;
use App\Rules\Hostsharing\ValidUsername;
use Livewire\Component;

class Create extends Component
{
    public $name;

    public $realm;

    public $linux_user;

    public $domain;

    public bool $create_on_hostsharing = false;

    public bool $create_on_stumv = false;

    public function render()
    {
        return view('livewire.pages.instances.create');
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:3|unique:instances,name',
            'realm' => 'required|min:3',
            'linux_user' => ['required', new ValidUsername, 'unique:instances,linux_user'],
            'domain' => 'required',
        ];
    }

    public function store(): void
    {
        $filtered = $this->validate();
        Instance::create($filtered);

        if ($this->create_on_hostsharing) {

        }
    }
}
