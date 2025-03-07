<div>
    <flux:button href="{{ route('instances.create') }}" icon="plus">Neue Instanz</flux:button>
    <flux:table :paginate="$this->instances">
        <flux:table.columns>
            <flux:table.column sortable>Name</flux:table.column>
            <flux:table.column sortable :sorted="$sortBy === 'realm'" wire:click="sort('realm')" :direction="$sortDirection">Realm</flux:table.column>
            <flux:table.column sortable>Version</flux:table.column>
            <flux:table.column sortable>Domain</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($this->instances as $instance)
                <flux:table.row :key="$instance->id">
                    <flux:table.cell class="flex items-center gap-3">
                        {{ $instance->name }}
                    </flux:table.cell>

                    <flux:table.cell class="whitespace-nowrap">
                        <flux:badge size="sm" inset="top bottom">{{ $instance->realm }}</flux:badge>
                    </flux:table.cell>

                    <flux:table.cell>
                        v
                    </flux:table.cell>

                    <flux:table.cell>
                        <flux:link href="https://{{ $instance->domain }}">{{ $instance->domain }}</flux:link>
                    </flux:table.cell>

                    <flux:table.cell>
                        <flux:modal.trigger name="search">
                            <flux:button variant="ghost" size="sm" icon="arrow-right" inset="top bottom"/>
                        </flux:modal.trigger>
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>

</div>
