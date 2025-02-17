<?php

namespace App\Exports;

use App\Models\NocApplication;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NocDataExport implements FromCollection, WithHeadings
{
    protected $status;

    // Constructor to accept the status parameter
    public function __construct($status)
    {
        $this->status = $status;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
            $status = $this->status;  // Assuming you're passing status from the controller to the export class
        
            $query = NocApplication::where('good_standing', false);
        
            // If the status is null, get all data
            if ($status === null) {
                $query = $query->get();
            }else {
                $query = $query->where('status', $status)->get();
            }
        
            return $query->transform(function ($noc) {
                return [
                    'first_name' => $noc->first_name,
                    'middle_name' => $noc->middle_name,
                    'last_name' => $noc->last_name,
                    'first_name_nepali' => $noc->first_name_nepali,
                    'middle_name_nepali' => $noc->middle_name_nepali,
                    'last_name_nepali' => $noc->last_name_nepali,
                    'title' => $noc->title,
                    'dob_ad' => $noc->dob_ad,
                    'dob_bs' => $noc->dob_bs,
                    'father_name' => $noc->father_name,
                    'mother_name' => $noc->mother_name,
                    'gender' => $noc->gender,
                    'citizenship' => $noc->citizenship,
                    'national_id' => $noc->national_id,
                    'issued_district' => $noc->issued_district,
                    'district' => $noc->district,
                    'municipality' => $noc->municipality,
                    'ward' => $noc->ward,
                    'tole' => $noc->tole,
                    'slc_institute' => $noc->slc_institute,
                    'slc_year' => $noc->slc_year,
                    'slc_grade' => $noc->slc_grade,
                    'slc_reg_no' => $noc->slc_reg_no,
                    'slc_remarks' => $noc->slc_remarks,
                    'plus2_institute' => $noc->plus2_institute,
                    'plus2_year' => $noc->plus2_year,
                    'plus2_grade' => $noc->plus2_grade,
                    'plus2_reg_no' => $noc->plus2_reg_no,
                    'plus2_remarks' => $noc->plus2_remarks,
                    'applied_college' => $noc->applied_college,
                    'applied_university' => $noc->applied_university,
                    'npc_enlisted' => $noc->npc_enlisted,
                    'status' => $noc->status,
                    'remarks' => $noc->remarks,
                    'ref' => $noc->ref,
                    'position' => $noc->position,
                    'registration_number' => $noc->registration_number,
                    'university' => $noc->university,
                    'registrar_name' => $noc->registrar_name,
                    'passed_year' => $noc->passed_year,
                    'email' => $noc->email,
                    'created_at' => Carbon::parse($noc->created_at)->format('Y-m-d'), // Convert to YYYY-MM-DD
                ];
            });
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
            'Position',
            'Registration Number',
            'University',
            'Registrar Name',
            'Passed Year',
            'Email',
            'Applied At'
        ];
    }
}
