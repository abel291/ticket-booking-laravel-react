<div class="flex items-center">
    <div class="flex items-center">
        <span>SI</span>
        <x-form-input class="ml-1" type="radio" name="active" value="1" wire:model.defer="{{$model}}">
        </x-form-input>
    </div>
    <div class="flex items-center ml-3">
        <span>NO</span>
        <x-form-input class="ml-1" type="radio" name="active" value="0" wire:model.defer="{{$model}}">
        </x-form-input>
    </div>
</div>