<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNocFormRequest extends FormRequest
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
            'applied_university' => 'required|string|max:255',
            'npc_enlisted'    => 'required|in:yes,no',

           'citizenship_front' => 'required|image|max:1048576', // 1MB
            'citizenship_back' => 'required|image|max:1048576', // 1MB
            'slc_marksheet' => 'required|image|max:1048576', // 1MB
            'slc_provisional' => 'required|image|max:1048576', // 1MB
            'slc_character' => 'required|image|max:1048576', // 1MB
            'equivalence' => 'nullable|image|max:1048576', // 1MB

            'plus2_marksheet' => 'required|image|max:1048576', // 1MB
            'plus2_provisional' => 'required|image|max:1048576', // 1MB
            'plus2_character' => 'required|image|max:1048576', // 1MB
            'plus2_equivalence' => 'nullable|image|max:1048576', // 1MB

            'bank_voucher' => 'required|image|max:1048576', // 1MB

        ];
    }

    /**
     * Custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'first_name_nepali.required' => 'The first name in Devanagari is required.',
            'last_name_nepali.required' => 'The last name in Devanagari is required.',
            'title.required' => 'The title field is required.',
            'title.in' => 'The selected title is invalid.',
            'first_name.required' => 'The first name in English is required.',
            'last_name.required' => 'The last name in English is required.',
            'dob_ad.required' => 'Date of Birth (AD) is required.',
            'dob_ad.date_format' => 'Date of Birth (AD) must be in the format YYYY-MM-DD.',
            'dob_bs.required' => 'Date of Birth (BS) is required.',
            'dob_bs.date_format' => 'Date of Birth (BS) must be in the format YYYY-MM-DD.',
            'father_name.required' => 'Father Name is required.',
            'mother_name.required' => 'Mother Name is required.',
            'gender.required' => 'Gender is required.',
            'gender.in' => 'Invalid Gender selection.',
            'citizenship.required' => 'Citizenship Number is required.',
            'national_id.required' => 'National ID No is required.',
            'issued_district.required' => 'Issued District is required.',
            'district.required' => 'The district field is required.',
            'district.string' => 'The district field must be a string.',
            'district.max' => 'The district field may not be greater than 255 characters.',
            'municipality.required' => 'The municipality/VDC field is required.',
            'municipality.string' => 'The municipality/VDC field must be a string.',
            'municipality.max' => 'The municipality/VDC field may not be greater than 255 characters.',
            'ward.required' => 'The ward field is required.',
            'ward.string' => 'The ward field must be a string.',
            'ward.max' => 'The ward field may not be greater than 10 characters.',
            'tole.required' => 'The tole field is required.',
            'tole.string' => 'The tole field must be a string.',
            'tole.max' => 'The tole field may not be greater than 255 characters.',

            

        ];
    }
}
