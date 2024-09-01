<?php

namespace App\Http\Requests\User;

use App\Rules\ValidRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{


    /**
     * rules
     *
     * @return array
     */
    public function rules(): array
    {
        $userId = $this->route('user');
        return [
            'username' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($userId),
            ],
            'role' => ['required', 'string', new ValidRole],

        ];
    }
}
