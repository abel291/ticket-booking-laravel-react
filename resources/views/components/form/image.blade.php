@props(['image'])

<div class="relative">

    <div class="py-4 flex gap-x-5">


        <div class="w-1/2">
            <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
            <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
                rel="stylesheet">
            <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
            <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

            <div wire:ignore x-data="{ file_image: null }" x-init="$nextTick(() => {
                FilePond.registerPlugin(FilePondPluginImagePreview);
                
                file_image = FilePond.create($refs.input_{{ $attributes['wire:model'] }}, {
                    acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
            
                });
                
                file_image.setOptions({
                    allowMultiple: {{ $attributes->has('multiple') ? 'true' : 'false' }},
                    
                    labelFileProcessingComplete: 'Carga completada',
                    server: {
                        process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                            @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
                        },
                        revert: (filename, load) => {
                            @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                        },
            
                    }
                });
            
            });"
                @reset-input-image.window="file_image && file_image.removeFiles();">

                <input type="file" x-ref="input_{{ $attributes['wire:model'] }}" />

            </div>
        </div>
        @if ($image)
            <div class="w-1/2 ">
                <img src="{{ $image }}" alt="" class="w-80  border border-gray-100 p-3" />
            </div>
        @endif
    </div>

</div>
