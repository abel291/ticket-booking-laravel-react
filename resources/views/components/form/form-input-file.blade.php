@props(['temp', 'multiple', 'name', 'saved '])
<div class="">
    <div class="mr-3" x-data="{ isUploading: false, progress: 0 }"
        x-on:livewire-upload-start="isUploading = false" x-on:livewire-upload-finish="isUploading = false"
        x-on:livewire-upload-error="isUploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress">

        <label for="{{ $name }}" wire:loading.class="bg-gray-500 cursor-auto"
            wire:loading.class.remove="bg-gray-800 cursor-pointer" wire:target="{{ $name }}"
            class=" inline-block  mb-4 cursor-pointer  px-4 py-2 bg-gray-800 border border-transparent 
            rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 
            active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray 
            sdisabled:opacity-25 transition ease-in-out duration-150">

            <span wire:loading.class="hidden" wire:target="{{ $name }}">Subir Imagen</span>
            <span wire:loading wire:target="{{ $name }}" x-text=" 'Subiendo ' + progress + '%' "></span>

            <input wire:target="{{ $name }}" wire:loading.attr="disabled" id="{{ $name }}" type="file"
                class="sr-only" wire:model="{{ $name }}" accept=".png, .jpg, .jpeg"
                {{ $multiple ? 'multiple' : '' }}>
        </label>

    </div>

    <!-- img temp-->
    @if ($temp)
        @if (is_array($temp))
            <div class="flex flex-wrap ">
                @foreach ($temp as $item)
                    <div class=" mb-3 mr-3">
                        <img class="rounded-lg h-44 max-w-full" src="{{ $item->temporaryUrl() }}">
                    </div>
                @endforeach
            </div>
        @else
            <img class="inline-block rounded-lg h-44 max-w-full" src="{{ $temp->temporaryUrl() }}">
        @endif
    @endif

    <!-- img saved-->
    @if ($saved)

        @if ($multiple && $saved->isNotEmpty())
            <div class="flex flex-wrap relative">
                <div wire:loading wire:target="remove_img" x-transition class="absolute inset-0 blur z-10 "></div>
                @foreach ($saved as $item)
                    <div wire:key="{{ $item->id }}" class="  mb-3 mr-3 rounded-lg overflow-hidden">
                        <img class="object-cover h-44  w-44"
                            src="{{ url('/storage/' . $item->img) }}?{{ rand(1, 300) }}">
                        <button type="button" wire:click="remove_img({{ $item->id }})"
                            class="py-2 w-full bg-red-500 text-sm font-medium text-white">
                            
                            <span wire:loading.class="hidden" wire:target="remove_img({{ $item->id }})">Eliminar</span>
                            
                            <span wire:loading wire:target="remove_img({{ $item->id }})">
                                <x-spinner-loading class="w-4 h-5 text-gray-200"/>
                            </span>
                        </button>
                    </div>
                @endforeach
            </div>
        @endif

        @if (is_string($saved))
            <img class="inline-block rounded-lg object-cover h-44  w-44"
                src="{{ url('/storage/' . $saved) }}?{{ rand(1, 300) }}">
        @endif
    @endif

</div>
{{-- //resolver el problema de eliminar varias imagenes a la vez --}}
