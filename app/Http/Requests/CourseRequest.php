<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:courses,slug,' . $this->route('course'),
            'description' => 'required|string',
            'department_id' => 'required|exists:departments,id',
            'level' => 'required|integer|min:1|max:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:active,inactive',
            'duration' => 'required|integer|min:1',
            'last_admission_date' => 'required|date',
        ];
    }
}
