<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMPharmaRequest extends FormRequest
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

            'bachelor_institute' => 'required|string|max:255',
            'bachelor_year'      => 'required|integer|min:1900|max:'.date('Y'),
            'bachelor_grade'     => 'required|string|max:50',
            'bachelor_reg_no'    => 'required|string|max:50',
            'bachelor_remarks'   => 'nullable|string|max:255',
            
            'master_institute' => 'required|string|max:255',
            'master_year'      => 'required|integer|min:1900|max:'.date('Y'),
            'master_grade'     => 'required|string|max:50',
            'master_reg_no'    => 'required|string|max:50',
            'master_remarks'   => 'nullable|string|max:255',

            'citizenship_front' => 'required|image|max:204800', // 200KB
            'citizenship_back' => 'required|image|max:204800', // 200KB

            'name_registration_of_npc_front' => 'required|image|max:204800',
            'name_registration_of_npc_back' => 'required|image|max:204800',

            'master_in_pharmacy_transcript_front' => 'required|image|max:204800',
            'master_in_pharmacy_transcript_back' => 'required|image|max:204800',
            'experience_details' => 'nullable|image|max:204800',

            'npc_registration_number' => 'required',
            'npc_registration_date' => 'required',

            'master_working' => 'nullable|string',
            'pharm_specialization' => 'nullable|string'
        ];
    }
}
