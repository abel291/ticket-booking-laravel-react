<div>
    <x-form.select required wire:model="event.category" name="category" id="category">

        <option>Seleciione una Categoria</option>
        @foreach (App\Models\Category::get() as $key => $item)
            <option value="{{ $item->id }}">{{ $g->name }}</option>
        @endforeach

    </x-form.select>
</div>
