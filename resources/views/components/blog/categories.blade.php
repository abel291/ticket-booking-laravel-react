<div class="grid grid-cols-3 gap-3">
    @foreach (App\Models\Category::get() as $key=>$item)
        <div class="flex items-baseline" wire:key="{{ $item->id }}">
            <div>
                <x-form.input required id="ca_{{ $item->id }}" type="checkbox" class="h-5 w-5 rounded border-gray-300"
                    name="categories[]" value="{{ $item->id }}"
                    wire:model.defer="categories.{{ $key }}" />
            </div>

            <label class="ml-1 block text-sm text-gray-600" for="ca_{{ $item->id }}">{{ $item->name }}</label>
        </div>
    @endforeach
</div>
