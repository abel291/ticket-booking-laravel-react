<?php

namespace App\Http\Requests;

use App\Services\EventService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class EventStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = EventService::getRulesCreateEvent();
        if ($this->route('event')) {
            $rules['slug'] = "required|string|max:255|unique:App\Models\Event,slug," . $this->route('event') . ",id";
            $rules['banner'] = 'nullable|image|max:1024|mimes:jpeg,jpg,png';
            $rules['card'] = 'nullable|image|max:1024|mimes:jpeg,jpg,png';
            $rules['thum'] = 'nullable|image|max:1024|mimes:jpeg,jpg,png';
        }

        return $rules;
    }
}
