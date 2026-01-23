<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Enum;
use App\Enums\UserRoles;
use App\Models\User;

class UserRequest extends FormRequest
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
        $user = $this->route('user');

        return [
            'first_name'   => ['required', 'string', 'max:80'],
            'last_name'    => ['required', 'string', 'max:120'],
            'email'        => [
                'required', 'string', 'lowercase', 'email', 'max:255',
                $user ? Rule::unique('users', 'email')->ignoreModel($user) : Rule::unique('users', 'email'),
            ],
            'phone_number' => [
                'required', 'string', 'regex:/^(2547|2541)[0-9]{8}$/',
            ],
            'password'     => [
                $this->isMethod('post') ? 'required' : 'nullable',
                'string', 'confirmed', Rules\Password::defaults(),
            ],
            'role'   => ['required', new Enum(UserRoles::class)],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required.',
            'first_name.max'      => 'First name must not exceed 70 characters.',

            'last_name.required'  => 'Last name is required.',
            'last_name.max'       => 'Last name must not exceed 120 characters.',

            'email.required'      => 'Email is required.',
            'email.email'         => 'Email must be a valid email address.',
            'email.max'           => 'Email must not exceed 255 characters.',
            'email.unique'        => 'Email is already taken.',

            'password.required'   => 'Password is required.',
            'password.confirmed'  => 'Password confirmation does not match.',

            'phone_number.regex'  => 'The phone number must start with 2547 or 2541 and have exactly 12 digits. (254746055xxx or 254116055xxx)',
        ];
    }
}
