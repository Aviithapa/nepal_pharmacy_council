<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGoodStandingRequest extends FormRequest
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
            'first_name_nepali' => 'required|string|max:255',
            'middle_name_nepali' => 'nullable|string|max:255',
            'last_name_nepali' => 'required|string|max:255',
            'title' => 'required|in:mr,ms,mrs',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob_ad' => 'required|date|date_format:Y-m-d',
            'dob_bs' => 'required|date|date_format:Y-m-d',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'citizenship' => 'required|string|max:20',
            'national_id' => 'required|string|max:20',
            'issued_district' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'ward' => 'required|string|max:10',
            'tole' => 'required|string|max:255',
            'slc_institute'   => 'required|string|max:255',
            'slc_year'        => 'required|integer|min:1900|max:'.date('Y'),
            'slc_grade'       => 'required|string|max:50',
            'slc_reg_no'      => 'required|string|max:50',
            'slc_remarks'     => 'nullable|string|max:255',

            'plus2_institute' => 'required|string|max:255',
            'plus2_year'      => 'required|integer|min:1900|max:'.date('Y'),
            'plus2_grade'     => 'required|string|max:50',
            'plus2_reg_no'    => 'required|string|max:50',
            'plus2_remarks'   => 'nullable|string|max:255',

            'applied_college'  => 'required|string|max:255',
            'applied_university' => 'nullable|string|max:255',
            'npc_enlisted'    => 'nullable|in:yes,no',

            'citizenship_front' => 'required|image|max:204800', // 200KB
            'citizenship_back' => 'required|image|max:204800', // 200KB
            'slc_marksheet' => 'required|image|max:204800',
            'slc_provisional' => 'required|image|max:204800',
            'slc_character' => 'required|image|max:204800',
            'equivalence' => 'nullable|image|max:204800',

            'plus2_marksheet' => 'required|image|max:204800',
            'plus2_provisional' => 'required|image|max:204800',
            'plus2_character' => 'required|image|max:204800',
            'plus2_equivalence' => 'nullable|image|max:204800',

            'bank_voucher' => 'required|image|max:204800',

            'bachelor_transcript' => 'nullable|image|max:204800',
            'bachelor_provisional' => 'nullable|image|max:204800',
            'bachelor_character' => 'nullable|image|max:204800',
            'bachelor_equivalence' => 'nullable|image|max:204800',

            'name_registration_of_npc' => 'required|image|max:204800',
            'name_registration_of_npc_back' => 'required|image|max:204800',

        ];
    }
}
