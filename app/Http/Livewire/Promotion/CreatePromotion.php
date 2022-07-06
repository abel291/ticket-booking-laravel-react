<?php

namespace App\Http\Livewire\Promotion;

use App\Enums\PromotionType;
use App\Models\Promotion;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;

class CreatePromotion extends Component
{
    public $label;

    public $label_plural;

    public $open = false;

    public Promotion $promotion;

    public $open_modal_confirmation_delete = false;

    protected function rules()
    {
        $rules = [
            'promotion.type' => new Enum(PromotionType::class),
            'promotion.description' => 'required|string|max:255',
            'promotion.value' => 'required|integer',
            'promotion.code' => 'required|string|max:8|unique:promotions,code,'.$this->promotion->id,
            'promotion.active' => 'required|boolean',
            'promotion.quantity' => 'required|integer',
            'promotion.expired' => 'required|date',
        ];
        if ($this->promotion->type == PromotionType::PERCENT->value) {
            $rules['promotion.value'] .= '|max:100';
        }

        return $rules;
    }

    public function mount()
    {
        $this->promotion = new Promotion();
        $this->resetErrorBag();
    }

    public function create()
    {
        $this->mount();
    }

    public function save()
    {
        $this->validate();
        $promotion = $this->promotion;
        $promotion->save();

        $this->dispatchBrowserEvent('notification', [
            'title' => 'Registro Agregado',
        ]);

        $this->emit('resetListPromotion');
        $this->reset('open');
        $this->mount();
    }

    public function edit(Promotion $promotion)
    {
        $this->promotion = $promotion;
        $this->resetErrorBag();
    }

    public function update()
    {
        $this->validate();
        $promotion = $this->promotion;
        $promotion->save();

        $this->dispatchBrowserEvent('notification', [
            'title' => 'Registro Editado',
        ]);

        $this->emit('resetListPromotion');
        $this->reset('open');
        $this->mount();
    }

    public function delete(Promotion $promotion)
    {
        $promotion->delete();
        $this->dispatchBrowserEvent('notification', [
            'title' => 'Registro Eliminado',
        ]);
        $this->emit('resetListPromotion');
        $this->reset('open', 'open_modal_confirmation_delete');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.promotion.create-promotion');
    }
}
