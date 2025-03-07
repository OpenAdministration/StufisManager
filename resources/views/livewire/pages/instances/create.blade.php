<div class="max-w-xl">
    <flux:breadcrumbs class="mb-8">
        <flux:breadcrumbs.item href="{{ route('home') }}" icon="home" />
        <flux:breadcrumbs.item href="{{ route('instances') }}">Instanzen</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>Neu</flux:breadcrumbs.item>
    </flux:breadcrumbs>
    <div class="space-y-6">
        <flux:input wire:model="name" label="Name" />

        <flux:input wire:model="realm" label="Realm" description="muss mit StuMV übereinstimmen" />

        <flux:field>
            <flux:label>Linux-Benutzer</flux:label>

            <flux:input.group>
                <flux:input.group.prefix>opa00-</flux:input.group.prefix>

                <flux:input wire:model="linux_user" placeholder="demo_finanzen" />
            </flux:input.group>

            <flux:error name="linux_user" />
        </flux:field>

        <flux:field>
            <flux:label>Domain</flux:label>

            <flux:input.group>
                <flux:input.group.prefix>https://</flux:input.group.prefix>

                <flux:input wire:model="domain" placeholder="demo.stufis.de" />
            </flux:input.group>

            <flux:error name="domain" />
        </flux:field>

        <flux:switch wire:model="create_on_hostsharing" label="Create on Hostsharing" align="left"/>

        <flux:button variant="primary" wire:click="store()">Speichern</flux:button>
    </div>

</div>
