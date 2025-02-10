<?php

namespace App\Models;

use App\Infrastructure\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NocApplication extends Model
{
    use HasFactory, SoftDeletes;
    use HasFilter;


    protected $table = 'noc_applicants';

    protected $fillable = [
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
        'citizenship_front',
        'citizenship_back',
        'slc_marksheet',
        'slc_provisional',
        'slc_character',
        'equivalence',
        'plus2_marksheet',
        'plus2_provisional',
        'plus2_character',
        'plus2_equivalence',
        'bank_voucher',
        'user_id',
        'status',
        'remarks',
        'pdf_link',
        'ref',
        'uuid',
        'bachelor_transcript',
        'bachelor_provisional',
        'bachelor_character',
        'bachelor_equivalence',
        'name_registration_of_npc',
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
        'name_registration_of_npc_back',
        'passport_front',
        'passport_back',
        'offer_letter',
        'email',
        'address_to_be_applied'
    ];

    /**
     * Define relationship with User model
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('Y-m-d');
    }

}
