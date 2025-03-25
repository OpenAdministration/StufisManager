<div>
    <flux:heading>Report</flux:heading>
    <flux:text class="mt-2">This is the standard text component for body copy and general content throughout your application.</flux:text>

    <flux:button wire:click="run()" icon="arrow-path-rounded-square">Run again</flux:button>

    @dump($lastResult)
</div>
