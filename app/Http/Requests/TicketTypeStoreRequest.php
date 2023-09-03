<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketTypeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:1', 'max:255'],
            'type' => ['required', 'string', 'min:1', 'max:255'],
            'price_basic' => ['required', 'numeric'],
            'includeFee' => ['boolean'],
            'quantity' => ['required', 'integer', 'min:0', 'max:16777215'],
            'default' => ['required', 'boolean'],
            'entry' => ['nullable', 'string', 'min:1', 'max:255'],
            'min_purchase' => ['required', 'integer', 'min:0', 'max:16777215'],
            'max_purchase' => ['required', 'integer', 'min:0', 'max:16777215'],
            'show_remaining_entries' => ['required', 'boolean'],
            'active' => ['required', 'boolean'],
            'sales_start_date' => ['required', 'date'],
            'sales_end_date' => ['required', 'date'],
        ];
    }
}
