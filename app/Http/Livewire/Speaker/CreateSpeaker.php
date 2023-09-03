<?php

namespace App\Http\Livewire\Speaker;

use App\Helpers\Helpers;
use App\Models\Speaker;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CreateSpeaker extends Component
{
	use WithFileUploads;
	public $label;

	public $label_plural;

	public $open = false;

	public Speaker $speaker;

	public $open_modal_confirmation_delete = false;

	public $event_id;

	public $img;

	protected function rules()
	{
		return [
			'speaker.name' => 'required|string',
			'speaker.position' => 'required|string',
			'speaker.website' => 'required|string',
			'speaker.desc' => 'required|string',
			'speaker.instagram' => 'required|string',
			'speaker.twitter' => 'required|string',
			'speaker.email' => 'required|email',
			//'speaker.active' => 'required|boolean',
			'img' => 'nullable|sometimes|image|max:1024|mimes:jpeg,jpg,png',
			//'event_id' => 'required|exists:App\Models\Event,id',
		];
	}

	public function mount()
	{
		$this->speaker = Speaker::factory()->make();
		$this->resetErrorBag();
	}

	public function create()
	{
		$this->mount();
		$this->speaker->img = "";
	}

	public function save()
	{
		$this->validate();
		$speaker = $this->speaker;
		//$speaker->event_id = $this->event_id;

		$speaker->img = Helpers::image_upload(
			img: $this->img,
			name: 'photo-' . Str::slug($speaker->name),
			directory: "speaker"
		);
		$speaker->save();
		if ($this->event_id) {
			$speaker->events()->attach($this->event_id);
		}

		$this->dispatchBrowserEvent('notification', [
			'title' => 'Registro Agregado',
		]);

		$this->emit('resetListSpeaker');
		$this->reset('open');
		$this->mount();
	}

	public function edit(Speaker $speaker)
	{
		$this->speaker = $speaker;
		$this->resetErrorBag();
	}

	public function update()
	{

		$this->validate();
		$speaker = $this->speaker;
		if ($this->img) {
			Storage::delete($speaker->img);

			$speaker->img = Helpers::image_upload(
				img: $this->img,
				name: 'photo-' . Str::slug($speaker->name),
				directory: "speaker"
			);
		}
		$speaker->save();

		$this->dispatchBrowserEvent('notification', [
			'title' => 'Registro Editado',
		]);

		$this->emit('resetListSpeaker');
		$this->reset('open');
		$this->mount();
	}
	public function delete(Speaker $speaker)
	{
		if ($speaker->events->count()) {
			$speaker->events()->detach($this->event_id);
		} else {
			//$speaker->delete();
			if ($speaker->img) {
				Storage::delete($speaker->img);
			}
		}

		$this->dispatchBrowserEvent('notification', [
			'title' => 'Registro Eliminado',
		]);

		$this->emit('resetListSpeaker');
		$this->reset('open', 'open_modal_confirmation_delete');
		$this->mount();
	}

	public function updateImg(): void
	{
		$this->validate([
			'img' => 'image|max:1024|mimes:jpeg,jpg,png',
		]);
	}

	public function render()
	{
		return view('livewire.speaker.create-speaker');
	}
}
