<?php

namespace App\Http\Requests\Auth;

use App\Models\Student;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class StudentRegistrationRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'password' => ['required', 'string', 'confirmed', 'min:6']
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First Name is required',
            'first_name.string' => 'First Name must be a string',

            'last_name.required' => 'Last Name is required',
            'last_name.string' => 'Last Name must be a string',

            'phone_number.required' => 'Phone Number is required',
            'phone_number.numeric' => 'Phone Number must be a number 0-9',

            'gender.required' => 'Gender is required',
            'gender.boolean' => 'Gender is invalid',

            'email.required' => 'Email is required',
            'email.email' => 'Email must be a string',
            'email.max' => 'Email must be a less than 255 char',
            'email.unique' => 'This email is already used',

            'password.required' => 'Password Link is required',
            'password.string' => 'Password Link must be a string',
            'password.min' => 'Password must be more than 6 char',
            'password.confirmed' => 'Passwords does not match',
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register()
    {
        $student = Student::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone_number' => $this->phone_number,
            'gender' => $this->gender,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'remember_token' => "",
        ]);

        Auth("student")->login($student);
    }
}
