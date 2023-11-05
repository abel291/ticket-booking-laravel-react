<?php

namespace App\Http\Livewire\Event;

use App\Enums\EventTypes;
use App\Helpers\Helpers;
use App\Models\Category;
use App\Models\Event;
use App\Traits\TraitUploadImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateEvent extends Component
{
    use TraitUploadImage, WithFileUploads;


    public $label;

    public $label_plural;

    public $open = false;

    public Event $event;

    public $open_modal_confirmation_delete = false;

    public $locations;
    public $categories;

    public $card;
    public $banner;
    public $thum;

    public $isEdit;

    protected function rules()
    {
        $rules = [
            'event.title' => 'required|string|max:255',
            'event.slug' => 'required|string|max:255',
            'event.active' => 'required|boolean',
            'event.duration' => 'nullable|string',
            'event.entry' => 'required|string|max:255',
            'event.description' => 'required|string|max:1000',

            // 'event.type' => new Enum(EventTypes::class),

            // 'event.tomatoes' => 'nullable|numeric|max:255',
            // 'event.audience' => 'nullable|numeric|max:255',
            // 'event.calificación' => 'nullable|numeric|max:255',

            // 'event.ceo_title' => 'required|string|max:255',
            // 'event.ceo_desc' => 'nullable|string|max:255',

            // 'event.social_fa' => 'nullable|string|max:255',
            // 'event.social_tw' => 'nullable|string|max:255',
            // 'event.social_yt' => 'nullable|string|max:255',

            'event.sub_category_id' => 'required|exists:App\Models\Category,id',
            'event.location_id' => 'required|exists:App\Models\Location,id',

            'banner' => 'nullable|sometimes|image|max:1024|mimes:jpeg,jpg,png',
            'card' => 'nullable|sometimes|image|max:1024|mimes:jpeg,jpg,png',
            'thum' => 'nullable|sometimes|image|max:1024|mimes:jpeg,jpg,png',
        ];

        return $rules;
    }

    public function mount($id = null)
    {
        $this->reset('banner', 'card', 'thum');

        $this->categories = Category::with('subCategories')->whereNull('category_id')->get();
        $this->isEdit = boolval($id);

        if ($id) {
            $this->event = Event::findOrFail($id);
            $this->locations = $this->event->user->locations;
        } else {
            $this->event = Event::factory()->make();
            $this->locations = auth()->user()->locations;
        }
        $this->resetErrorBag();
    }

    public function create()
    {
        $this->mount();
    }

    public function save()
    {

        $this->validate();
        $event = $this->event;
        $event->slug = Str::slug($event->slug);
        $event->user_id = auth()->user()->id;

        $event->category_id = Category::with('category')->find($event->sub_category_id)->category->id;

        if ($this->card) {
            $event->card = $this->upload_image($event->name, 'events/card', $this->card);
        }

        if ($this->thum) {
            $event->thum = $this->upload_image($event->name, 'events/thum', $this->thum);
        }

        if ($this->banner) {
            $event->banner = $this->upload_image($event->name, 'events', $this->banner);
        }

        $event->save();

        to_route('dashboard.events')->with(['success' => 'Registro Guardado']);
    }

    public function edit($id)
    {
        $event = Event::query();
        $event = $event->findOrFail($id);
        $this->event = $event;
        $this->reset('card', 'banner');
        $this->resetErrorBag();
    }

    public function update()
    {
        $this->validate();
        $event = $this->event;
        $event->slug = Str::slug($event->slug);
        $event->category_id = Category::with('category')->find($event->sub_category_id)->category->id;

        if ($this->card) {
            Storage::delete($event->card);
            $event->card = $this->upload_image($event->name, 'events/card', $this->card);
        }

        if ($this->thum) {
            Storage::delete($event->thum);
            $event->thum = $this->upload_image($event->name, 'events/thum', $this->thum);
        }

        if ($this->banner) {
            Storage::delete($event->banner);
            $event->banner = $this->upload_image($event->name, 'events', $this->banner);
        }

        $event->save();

        to_route('dashboard.events');
    }

    public function delete(Event $event)
    {
        $event->delete();
        $this->dispatchBrowserEvent('notification', [
            'title' => 'Registro Eliminado',
        ]);
        $this->emit('resetListEvent');
        $this->reset('open', 'open_modal_confirmation_delete');
        $this->mount();
    }

    public function updatedBanner(): void
    {
        $this->validate([
            'banner' => 'image|max:1024|mimes:jpeg,jpg,png',
        ]);
    }

    public function updatedCard(): void
    {
        $this->validate([
            'card' => 'image|max:1024|mimes:jpeg,jpg,png',
        ]);

        // File is an image that is < 10mb
    }
    public function updatedThum(): void
    {
        $this->validate([
            'thum' => 'image|max:1024|mimes:jpeg,jpg,png',
        ]);

        // File is an image that is < 10mb
    }

    public function render()
    {
        return view('livewire.event.create-event');
    }

    //termianr el form de event vovler a intalar spatie
}
