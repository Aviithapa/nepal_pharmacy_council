<?php

namespace App\Http\Requests\User;

use App\Rules\ValidRole;
use Illuminate\Foundation\Http\FormRequest;

class AdminUserCreateRequest extends FormRequest
{

    /**
     * rules
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string', new ValidRole],
            'status' => ['required', 'boolean'],
            'password' => ['required', 'string', 'min:6', 'max:255'],
        ];
    }
}
