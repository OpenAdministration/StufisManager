<div>
    <flux:heading>Report</flux:heading>
    <flux:text class="mt-2">This is the standard text component for body copy and general content throughout your application.</flux:text>

    <flux:button wire:click="run()" icon="arrow-path-rounded-square">Run again</flux:button>
    @isset($lastResult)
        @if(!empty($lastResult->diff))
            <flux:table>
                <flux:table.columns>
                    <flux:table.column>Key</flux:table.column>
                    <flux:table.column>Target Value</flux:table.column>
                    <flux:table.column>Actual Value</flux:table.column>
                </flux:table.columns>
                <flux:table.rows>
                    @foreach($lastResult->diff as $key => $diff)
                        <flux:table.row>
                            <flux:table.cell>{{ $key }}</flux:table.cell>
                            <flux:table.cell>{{ $diff['target'] }}</flux:table.cell>
                            <flux:table.cell>{{ $diff['actual'] }}</flux:table.cell>
                        </flux:table.row>
                    @endforeach
                </flux:table.rows>
            </flux:table>
            <flux:button>Fix it</flux:button>
        @endif
    @endisset
</div>
