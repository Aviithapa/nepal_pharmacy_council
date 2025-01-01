<?php

namespace App\Http\Requests\Noc;

use App\Models\NocUsers;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreateNumberStore extends FormRequest
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
        return [
            'phone_number' => 'required|numeric|digits:10',
        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator(Validator $validator): void
    {
        $validator->after(function ($validator) {
            $phoneNumber = $this->input('phone_number');
            $user = NocUsers::where('phone_number', $phoneNumber)->first();
            session(['phone_number' => $phoneNumber]);

            if ($user) {
                if ($user->status === 'in-active') {
                    $validator->errors()->add(
                        'phone_number_inactive',
                        'The phone number is used but not active. <a href="/resend-code" style="color:blue; padding-bottom:20px;">Resend the code</a>'
                    );
                } else {
                    $validator->errors()->add(
                        'phone_number',
                        'The phone number is already used. Please login.'
                    );
                }
            }
        });
    }
}
