<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:8'],
            'description' => ['required',  'min:8'],
            'surface' => ['required', 'numeric', 'min:10'],
            'rooms' => ['required', 'numeric', 'min:1'],
            'bedrooms' => ['required', 'numeric', 'min:0'],
            'floor' => ['required', 'numeric', 'min:0'],
            'price' => ['required', 'numeric', 'min:0'],
            'city' => ['required', 'min:0'],
            'address' => ['required', 'min:0'],
            'postal_code' => ['required', 'min:0'],
            'sold' => ['required', 'boolean'],
        ];
    }
}
