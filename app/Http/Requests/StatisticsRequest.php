<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatisticsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'key' => 'required|string|max:255|unique:statistics,key,' . $this->id,
            'value' => 'required|string|max:255',
        ];
    }
}
