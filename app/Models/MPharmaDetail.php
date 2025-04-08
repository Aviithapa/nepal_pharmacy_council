<?php

namespace App\Models;

use App\Infrastructure\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MPharmaDetail extends Model
{
    use HasFactory, SoftDeletes, HasFilter;

    protected $table = 'm_pharma_details';

    protected $fillable = [
        'first_name', 'middle_name', 'last_name',
        'first_name_nepali', 'middle_name_nepali', 'last_name_nepali',
        'title', 'dob_ad', 'dob_bs', 'father_name', 'mother_name',
        'gender', 'citizenship', 'issued_district',
        'district', 'municipality', 'ward', 'tole',
        'slc_institute', 'slc_year', 'slc_grade', 'slc_reg_no', 'slc_remarks',
        'plus2_institute', 'plus2_year', 'plus2_grade', 'plus2_reg_no', 'plus2_remarks',
        'bachelor_institute', 'bachelor_year', 'bachelor_grade', 'bachelor_reg_no', 'bachelor_remarks',
        'master_institute', 'master_year', 'master_grade', 'master_reg_no', 'master_remarks',
        'npc_registration_number', 'npc_registration_date',
        'citizenship_front', 'citizenship_back',
        'name_registration_of_npc_front', 'name_registration_of_npc_back',
        'master_in_pharmacy_transcript_front', 'master_in_pharmacy_transcript_back',
        'experience_details', 'status', 'remarks',
        'pdf_link', 'ref', 'uuid', 'user_id', 'master_working', 'pharm_specialization'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
