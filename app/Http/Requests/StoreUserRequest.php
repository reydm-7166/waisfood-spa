<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => ['required', 'min:3', 'max:50', 'alpha'],
            'lastname' => ['required', 'min:3', 'max:50', 'alpha'],
            'age' => ['required', 'integer'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:3', 'max:50'],
            'username' => ['required', 'min:3', 'max:50'],
        ];
    }
}
