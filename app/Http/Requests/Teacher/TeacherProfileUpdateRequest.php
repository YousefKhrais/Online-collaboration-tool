<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class TeacherProfileUpdateRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric'],
            'gender' => ['required', 'boolean'],
//            'email' => ['required', 'string', 'email', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'date_of_birth' => ['nullable', 'date'],
            'description' => ['nullable', 'string', 'max:255'],
            'github' => ['nullable', 'url'],
            'linkedin' => ['nullable', 'url'],
            'stack_overflow' => ['nullable', 'url']
//            Address
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First Name is required',
            'first_name.string' => 'First Name must be a string',

            'last_name.required' => 'Last Name is required',
            'last_name.string' => 'Last Name must be a string',

            'address.string' => 'Address must be a string',

            'phone_number.required' => 'Phone Number is required',
            'phone_number.numeric' => 'Phone Number must be a number 0-9',

            'gender.required' => 'Gender is required',
            'gender.boolean' => 'Gender is invalid',

            'email.required' => 'Email is required',
            'email.email' => 'Email must be a string',
            'email.max' => 'Email must be a less than 255 char',
            'email.unique' => 'This email is already used',

            'date_of_birth.date' => 'Date Of Birth must be a date',

            'github.url' => 'Github must be a url',
            'linkedin.url' => 'Linkedin must be a url',
            'stack_overflow.url' => 'stack Overflow must be a url'
        ];
    }
}
