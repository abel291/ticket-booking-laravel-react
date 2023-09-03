<div>
    <div x-on:close.stop="show = false" x-on:keydown.escape.window="show = false" x-show="show"
        class="absolute top-0 inset-x-0 px-4 pt-6 z-40 sm:px-0 sm:flex sm:items-top sm:justify-center"
        style="display: none;">

        <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false"
            x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div x-show="show"
            class=" bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-2xl md:max-w-5xl "
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            <div class="px-7 py-7 ">
                <div class="text-lg font-medium">
                    {{ $title }}
                </div>

                <div class="mt-4 content-modal relative">
                    <div wire:loading.flex wire:target="create, edit, view" class="items-start absolute inset-0">
                        <x-spinner-loading class="h-5 w-5 text-gray-600" /> Cargando...
                    </div>
                    <div wire:loading.class="invisible" wire:target="create, edit, view">
                        {{ $content }}
                    </div>
                </div>
            </div>


            <div class="px-6 py-4 bg-gray-100 text-right">
                {{ $footer }}
            </div>


        </div>
    </div>
</div>
