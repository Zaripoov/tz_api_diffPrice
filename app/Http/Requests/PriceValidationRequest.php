<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceValidationRequest extends FormRequest
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
            'new_price' => ['required', 'numeric'],
            'old_price' => ['required', 'numeric'],
        ];
    }

    public function getNewPrice(): float|int
    {
        return $this->post('new_price');
    }

    public function getOldPrice(): float|int
    {
        return $this->post('old_price');
    }
}
