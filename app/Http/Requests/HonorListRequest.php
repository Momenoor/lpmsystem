<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HonorListRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'staff_id' => 'required|exists:staff,id', 
            'achievement' => 'required|string|max:255',
            'period' => 'required|string|max:100',
        ];
    }
}
