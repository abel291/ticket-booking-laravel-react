<div class="mt-4">
    <div wire:loading.flex wire:target="create, edit" class="items-center">
        <x-spinner-loading class="h-5 w-5 text-gray-600" /> Cargando...
    </div>
    <div wire:loading.class="invisible" wire:target="create, edit">
        {{ $slot }}
    </div>
</div>
