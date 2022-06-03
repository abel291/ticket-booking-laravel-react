<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'event_slug' => ['required', Rule::exists('events', 'slug')->where(function ($query) {
                return $query->where('active', 1)->where('slug', request()->event_slug);
            }),],
            'date' => ['date', 'required', 'after:now'],
            'tickets_quantity' => ['required', 'array', 'min:1'],
            'name' => ['required', 'max:255', 'min:3'],
            'phone' => ['required', 'max:20', 'min:3'],
            'code_promotion' => ['sometimes', 'nullable', 'exists:promotions,code'],
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'tickets_quantity.required' => 'Aun no ha elegido ningun Boleto',
            'tickets_quantity.min' => 'Aun no ha elegido ningun Boleto',

        ];
    }
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'tickets_quantity' => 'Boletos',
            'date' => 'Fecha',
            'tickets_quantity' => 'Boletos',
            'name' => 'Nombre',
            'phone' => 'Telefono',
            'code_promotion' => 'Codigo de promocion'

        ];
    }
}
