<x-filament-panels::page>
        <x-filament-panels::form
            id="form"
            :wire:key="$this->getId() . '.forms.' . $this->getFormStatePath()"
            wire:submit="saveSettings"
        >
            {{ $this->form }}
        </x-filament-panels::form>
</x-filament-panels::page>
