<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class CourseUpdateRequest extends FormRequest
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
     * $table->string('image_link')->nullable(false);
     *
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description' => 'required|string',
            'image_link' => 'required|url',

            'schedule' => 'nullable|string',
            'requirements' => 'nullable|string',
            'syllabus' => 'nullable|string',
            'outline' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'Course Description is required',
            'description.string' => 'Course Description must be a string',

            'image_link.required' => 'Course Image is required',
            'image_link.url' => 'Course Image must be a URL',

            'schedule.string' => 'Schedule must be string',
            'requirements.string' => 'Requirements must be string',
            'syllabus.string' => 'Syllabus must be string',
            'outline.string' => 'Outline must be string',
        ];
    }
}
