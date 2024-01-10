<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class ProfilePasswordUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'min:5', 'confirmed']
        ];
    }
    function messages() : array {
        return [
            'current_password.current_password' => 'Current Password is invalid!'
        ];
    }
}
