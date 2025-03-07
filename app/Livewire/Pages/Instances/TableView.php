<?php

namespace App\Livewire\Pages\Instances;

use Illuminate\Support\Collection;
use Livewire\Component;

class TableView extends Component
{
    use \Livewire\WithPagination;

    public $sortBy = 'realm';
    public $sortDirection = 'desc';

    public function sort($column) {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function render() : \Illuminate\View\View
    {
        return view('livewire.pages.instances.index');
    }

    #[\Livewire\Attributes\Computed]
    public function instances()
    {
        return \App\Models\Instance::query()
            ->tap(fn ($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)
            ->paginate(10);
    }
}
