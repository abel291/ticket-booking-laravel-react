<?php

namespace App\Http\Livewire\Event;

use App\Enums\EventTypes;
use App\Helpers\Helpers;
use App\Models\Event;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Enum;
use Livewire\WithFileUploads;


class CreateEvent extends Component
{
    use WithFileUploads;
    
    public $open = false;
    public $is_edit=false;
    public Event $event;
    public $open_modal_confirmation_delete = false;

    public $banner;
    public $card;


    protected function rules()
    {
        $rules = [
            'event.name'        => 'required|string|max:255',
            'event.slug'         => 'required|string|max:255',
            'event.active'       => 'required|boolean',
            'event.duration'        => 'nullable|string',
            'event.type'        => new Enum(EventTypes::class),

            'event.tomatoes'     => 'nullable|numeric|max:255',
            'event.audience'     => 'nullable|numeric|max:255',
            'event.calificación'     => 'nullable|numeric|max:255',

            'event.ceo_title'     => 'required|string|max:255',
            'event.ceo_desc'     => 'nullable|string|max:255',

            'event.social_fa'     => 'nullable|string|max:255',
            'event.social_tw'     => 'nullable|string|max:255',
            'event.social_yt'     => 'nullable|string|max:255',

            'event.desc_min'     => 'required|string|max:255',
            'event.desc_max'     => 'required|string|max:1000',
            'event.category_id'  => 'required|exists:App\Models\Category,id',
            'event.location_id'  => 'required|exists:App\Models\Location,id',

            'banner'       => 'nullable|sometimes|image|max:1024|mimes:jpeg,jpg,png',
            'card'       => 'nullable|sometimes|image|max:1024|mimes:jpeg,jpg,png',
        ];
        return $rules;
    }

    public function mount()
    {
        $this->reset('banner', 'card');
        $this->event = Event::factory()->make();
        //$this->categories = Category::get()->random(5)->pluck('id')->toArray();
        $this->resetErrorBag();
    }

    public function create()
    {
        $this->mount();
    }

    public function save()
    {
        //dd($this->card,$this->banner);
        $this->validate();
        $event = $this->event;
        $event->slug = Str::slug($event->slug);
        $event->save();

        $name_img = Helpers::generate_img_name($event->slug, $this->card->extension());
        $event->addMedia($this->card->getRealPath())->usingName('event-card' . $event->slug)->usingFileName($name_img)->toMediaCollection('card');

        $name_img = Helpers::generate_img_name($event->slug, $this->banner->extension());
        $event->addMedia($this->banner->getRealPath())->usingName('event-banner' . $event->slug)->usingFileName($name_img)->toMediaCollection('banner');

        $this->emit('resetListEvent');
        $this->reset('open');
        $this->mount();
        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Agregado",
        ]);
    }

    public function edit(Event $event)
    {
        $this->event = $event;
        $this->reset('card', 'banner');
        $this->resetErrorBag();
    }

    public function update()
    {
       
        $this->validate();
        $event = $this->event;
        $event->slug = Str::slug($event->slug);
        $event->save();


        
        if ($this->card) {
            $event->clearMediaCollection('card');
            $name_img = Helpers::generate_img_name($event->slug, $this->card->extension());
            $event->addMedia($this->card->getRealPath())->usingName('event-card' . $event->slug)->usingFileName($name_img)->toMediaCollection('card');
        }

        if ($this->banner) {
            $event->clearMediaCollection('banner');
            $name_img = Helpers::generate_img_name($event->slug, $this->banner->extension());
            $event->addMedia($this->banner->getRealPath())->usingName('event-banner' . $event->slug)->usingFileName($name_img)->toMediaCollection('banner');
        }

        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Editado",
        ]);

        $this->emit('resetListEvent');
        $this->reset('open');
        $this->mount();
    }

    public function delete(Event $event)
    {

        $event->delete();
        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Eliminado",
        ]);
        $this->emit('resetListEvent');
        $this->reset('open', 'open_modal_confirmation_delete');
        $this->mount();
    }
    public function updateBanner(): void
    {
        $this->validate([
            'banner' => 'image|max:1024|mimes:jpeg,jpg,png',
        ]);
    }
    public function updateCard(): void
    {
        $this->validate([
            'card' => 'image|max:1024|mimes:jpeg,jpg,png',
        ]);

        // File is an image that is < 10mb
    }
    public function render()
    {
        return view('livewire.event.create-event');
    }

    //termianr el form de event vovler a intalar spatie
}
