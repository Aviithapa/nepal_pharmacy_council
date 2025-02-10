<?php

namespace App\Exports;

use App\Models\NocApplication;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NocDataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return NocApplication::all([
            'first_name',
            'middle_name',
            'last_name',
            'first_name_nepali',
            'middle_name_nepali',
            'last_name_nepali',
            'title',
            'dob_ad',
            'dob_bs',
            'father_name',
            'mother_name',
            'gender',
            'citizenship',
            'national_id',
            'issued_district',
            'district',
            'municipality',
            'ward',
            'tole',
            'slc_institute',
            'slc_year',
            'slc_grade',
            'slc_reg_no',
            'slc_remarks',
            'plus2_institute',
            'plus2_year',
            'plus2_grade',
            'plus2_reg_no',
            'plus2_remarks',
            'applied_college',
            'applied_university',
            'npc_enlisted',
            'status',
            'remarks',
            'ref',
            'good_standing',
            'bachelor_institute',
            'bachelor_year',
            'bachelor_grade',
            'bachelor_reg_no',
            'bachelor_remarks',
            'position',
            'registration_number',
            'level',
            'university',
            'registrar_name',
            'passed_year',
            'email'
        ]);
    }

    public function headings(): array
    {
        return [
            'First Name',
            'Middle Name',
            'Last Name',
            'First Name (Nepali)',
            'Middle Name (Nepali)',
            'Last Name (Nepali)',
            'Title',
            'DOB (AD)',
            'DOB (BS)',
            'Father Name',
            'Mother Name',
            'Gender',
            'Citizenship',
            'Passport',
            'Issued District',
            'District',
            'Municipality',
            'Ward',
            'Tole',
            'SLC Institute',
            'SLC Year',
            'SLC Grade',
            'SLC Registration Number',
            'SLC Remarks',
            'Plus2 Institute',
            'Plus2 Year',
            'Plus2 Grade',
            'Plus2 Registration Number',
            'Plus2 Remarks',
            'Applied College',
            'Applied University',
            'NPC Enlisted',
            'Status',
            'Remarks',
            'Reference',
            'UUID',
            'Good Standing',
            'Bachelor Institute',
            'Bachelor Year',
            'Bachelor Grade',
            'Bachelor Registration Number',
            'Bachelor Remarks',
            'Position',
            'Registration Number',
            'Level',
            'University',
            'Registrar Name',
            'Passed Year',
            'Email'
        ];
    }
}
