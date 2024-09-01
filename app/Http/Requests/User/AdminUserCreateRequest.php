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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string', new ValidRole],
            'position' => ['required', 'string'],
            'status' => ['required', 'boolean'],
        ];
    }
}
