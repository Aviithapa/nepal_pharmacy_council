@extends('admin.layout.app')
<link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
<style>
    .blink {
        animation: blink-animation 1s step-start infinite;
    }

    @keyframes blink-animation {
        0% {
            opacity: 0;
        }

        50% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }
</style>
@section('content')
    <script src="https://cdn.tailwindcss.com"></script>

    <div class="" style="padding: 15px; background: lightyellow; margin: 10px 0px; border-left: 4px solid yellow;">
        <p style="font-weight: 700; font-size:26px; color: black;">Specialization Update (M Pharmacy).</p>

        Make sure you associate with correct details.
    </div>

    @isset($data)
        @if ($data->status === 'pending')
            <div style="padding: 15px; background: lightyellow; margin: 10px 0px; border-left: 4px solid yellow;">
                <p style="font-weight: 700; font-size: 26px; color: black;">Thank you for the information. Your form has been
                    successfully submitted.</p>
                {{-- <p>Please wait while the council processes your request. You will be notified once there is any update.</p> --}}
            </div>
        @elseif ($data->status === 'approved')
            <div style="padding: 15px; background: lightgreen; margin: 10px 0px; border-left: 4px solid green;">
                <p style="font-weight: 700; font-size: 26px; color: black;">Your Good Standing has been approved and generated.
                </p>
            </div>
        @elseif ($data->status === 'rejected')
            <div style="padding: 15px; background: rgb(255, 185, 185); margin: 10px 0px; border-left: 4px solid red;">
                <p style="font-weight: 700; font-size: 26px; color: black;">Your Good Standing has been rejected.</p>
                <p>{{ $data->remarks }}</p>
            </div>
        @endif
    @endisset

    @if (isset($data))
        <form action="{{ route('m-pharma.update', ['m_pharma' => $data->id]) }}" enctype="multipart/form-data"
            method="POST" class="gap-2  py-12" style=" background: white; padding: 10px;">
            @method('PUT')
        @else
            <form action="{{ route('m-pharma.store') }}" enctype="multipart/form-data" method="POST" class="gap-2  py-12"
                style=" background: white; padding: 10px;">
    @endif

    @csrf
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <h1 class="col-span-3 text-center text-primary text-xl font-semibold uppercase">
            Personal Information
            </h2>
            <div class="col-span-1">
                <label for="firstNameNepali">देवनागरी मा पहिलो नाम </label>
                <input type="text" name="first_name_nepali" id="firstName" class="form-input w-full"
                    placeholder="First Name"
                    value="{{ isset($data) ? $data->first_name_nepali : old('first_name_nepali') }}"
                    {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'readonly' : '') : '' }}
                    required>
                @error('first_name_nepali')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-1">
                <label for="middleNameNepali">देवनागरी मा बीचको नाम</label>
                <input type="text" name="middle_name_nepali" id="middleName" class="form-input w-full"
                    placeholder="Middle Name"
                    value="{{ isset($data) ? $data->middle_name_nepali : old('middle_name_nepali') }}"
                    {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'readonly' : '') : '' }}>
                @error('middle_name_nepali')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-1">
                <label for="lastNameNepali">थर</label>
                <input type="text" name="last_name_nepali" id="lastNameNepali" class="form-input w-full"
                    placeholder="Last Name" value="{{ isset($data) ? $data->last_name_nepali : old('last_name_nepali') }}"
                    {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'readonly' : '') : '' }}
                    required>
                @error('last_name_nepali')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
    </div>


    <div class="grid grid-cols-1 lg:grid-cols-4 gap-5">
        <div class="col-span-1">
            <label for="title">Title</label>
            <select name="title" id="title" class="form-select w-full @error('title') border-red-500 @enderror"
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'disabled' : '') : '' }}
                required>
                <option value="" {{ old('title') == '' ? 'selected' : '' }}>Select Title</option>
                <option value="mr"
                    {{ old('title') == 'mr' || (isset($data) && $data->title === 'mr') ? 'selected' : '' }}>Mr</option>
                <option value="ms"
                    {{ old('title') == 'ms' || (isset($data) && $data->title === 'ms') ? 'selected' : '' }}>Ms</option>
                <option value="mrs"
                    {{ old('title') == 'mrs' || (isset($data) && $data->title === 'mrs') ? 'selected' : '' }}>Mrs</option>
            </select>
            @error('title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-span-1">
            <label for="firstName">First Name in English</label>
            <input type="text" name="first_name" id="firstName" class="form-input w-full" placeholder="First Name"
                value="{{ isset($data) ? $data->first_name : old('first_name') }}"
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'readonly' : '') : '' }}
                required>
            @error('first_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-span-1">
            <label for="middleName">Middle Name in English</label>
            <input type="text" name="middle_name" id="middleName" class="form-input w-full" placeholder="Middle Name"
                value="{{ isset($data) ? $data->middle_name : old('middle_name') }}"
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'readonly' : '') : '' }}>
            @error('middle_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-span-1">
            <label for="lastName">Last Name in English</label>
            <input type="text" name="last_name" id="lastName" class="form-input w-full" placeholder="Last Name"
                value="{{ isset($data) ? $data->last_name : old('last_name') }}"
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'readonly' : '') : '' }}
                required>
            @error('last_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
        <!-- Date of Birth AD -->
        <div class="col-span-2">
            <label for="dob_ad">Date Of Birth -- AD (जन्म मिति) (YYYY-MM-DD)</label>
            <input type="text" name="dob_ad" id="dob_ad"
                class="form-input w-full @error('dob_ad') border-red-500 @enderror" placeholder="YYYY-MM-DD"
                value="{{ old('dob_ad', isset($data) ? $data->dob_ad : '') }}"
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'readonly' : '') : '' }}
                required>
            @error('dob_ad')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Date of Birth BS -->
        <div class="col-span-2">
            <label for="dob_bs">Date Of Birth -- BS (जन्म मिति)</label>
            <input type="text" name="dob_bs" id="dob_bs"
                class="form-input w-full @error('dob_bs') border-red-500 @enderror" placeholder="YYYY-MM-DD"
                value="{{ old('dob_bs', isset($data) ? $data->dob_bs : '') }}"
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'readonly' : '') : '' }}
                required>
            @error('dob_bs')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Father Name -->
        <div class="col-span-2">
            <label for="father_name">Father Name (बुबाको नाम)</label>
            <input type="text" name="father_name" id="father_name"
                class="form-input w-full @error('father_name') border-red-500 @enderror"
                value="{{ old('father_name', isset($data) ? $data->father_name : '') }}"
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'readonly' : '') : '' }}
                required>
            @error('father_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Mother Name -->
        <div class="col-span-2">
            <label for="mother_name">Mother Name (आमाको नाम)</label>
            <input type="text" name="mother_name" id="mother_name"
                class="form-input w-full @error('mother_name') border-red-500 @enderror"
                value="{{ old('mother_name', isset($data) ? $data->mother_name : '') }}"
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'readonly' : '') : '' }}
                required>
            @error('mother_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Gender -->
        <div class="col-span-2">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-select w-full @error('gender') border-red-500 @enderror"
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'disabled' : '') : '' }}
                required>
                <option value="">Select Gender</option>
                <option value="male" {{ old('gender', isset($data) ? $data->gender : '') == 'male' ? 'selected' : '' }}>
                    Male</option>
                <option value="female"
                    {{ old('gender', isset($data) ? $data->gender : '') == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other"
                    {{ old('gender', isset($data) ? $data->gender : '') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('gender')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Citizenship Number -->
        <div class="col-span-2">
            <label for="citizenship">Citizenship Number</label>
            <input type="text" name="citizenship" id="citizenship"
                class="form-input w-full @error('citizenship') border-red-500 @enderror"
                value="{{ old('citizenship', isset($data) ? $data->citizenship : '') }}"
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'readonly' : '') : '' }}
                required>
            @error('citizenship')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>


        <!-- Issued District -->
        <div class="col-span-2">
            <label for="issued_district">Citizenship Issued District</label>
            <input type="text" name="issued_district" id="issued_district"
                class="form-input w-full @error('issued_district') border-red-500 @enderror"
                value="{{ old('issued_district', isset($data) ? $data->issued_district : '') }}"
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'readonly' : '') : '' }}
                required>
            @error('issued_district')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-span-2">
            <label for="npc_registration_number">NPC Registration Number (Pharmacist)</label>
            <input type="text" name="npc_registration_number" id="npc_registration_number"
                class="form-input w-full @error('npc_registration_number') border-red-500 @enderror"
                value="{{ old('npc_registration_number', isset($data) ? $data->npc_registration_number : '') }}"
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'readonly' : '') : '' }}
                required>
            @error('npc_registration_number')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="col-span-2">
            <label for="npc_registration_date">NPC Registration Date </label>
            <input type="text" name="npc_registration_date" id="npc_registration_date"
                class="form-input w-full @error('npc_registration_date') border-red-500 @enderror"
                value="{{ old('npc_registration_date', isset($data) ? $data->email : '') }}"
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'readonly' : '') : '' }}
                required>
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-span-2">
            <label for="pharm_specialization">M. Pharm Specialization</label>
            <select name="pharm_specialization" id="pharm_specialization"
                class="form-select w-full @error('gender') border-red-500 @enderror" {{-- {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'disabled' : '') : '' }} --}} required>
                <option value="">Select M. Pharm Specialization</option>
                <option value="Pharmaceutical Chemistry"
                    {{ old('pharm_specialization', isset($data) ? $data->pharm_specialization : '') == 'Pharmaceutical Chemistry' ? 'selected' : '' }}>
                    Pharmaceutical Chemistry</option>
                <option value="Pharmaceutics"
                    {{ old('pharm_specialization', isset($data) ? $data->pharm_specialization : '') == 'Pharmaceutics' ? 'selected' : '' }}>
                    Pharmaceutics</option>

                <option value="Pharmacognosy"
                    {{ old('pharm_specialization', isset($data) ? $data->pharm_specialization : '') == 'Pharmacognosy' ? 'selected' : '' }}>
                    Pharmacognosy</option>

                <option value="Clinical Pharmacy"
                    {{ old('pharm_specialization', isset($data) ? $data->pharm_specialization : '') == 'Clinical Pharmacy' ? 'selected' : '' }}>
                    Clinical Pharmacy</option>

                <option value="Industrial Pharmacy"
                    {{ old('pharm_specialization', isset($data) ? $data->pharm_specialization : '') == 'Industrial Pharmacy' ? 'selected' : '' }}>
                    Industrial Pharmacy</option>

                <option value="Quality Assurance"
                    {{ old('pharm_specialization', isset($data) ? $data->pharm_specialization : '') == 'Quality Assurance' ? 'selected' : '' }}>
                    Quality Assurance</option>

                <option value=" Pharmaceutical care"
                    {{ old('pharm_specialization', isset($data) ? $data->pharm_specialization : '') == 'Pharmaceutical care' ? 'selected' : '' }}>
                    Pharmaceutical Care </option>

                <option value=" Pharmacology "
                    {{ old('pharm_specialization', isset($data) ? $data->pharm_specialization : '') == 'Pharmacology' ? 'selected' : '' }}>
                    Pharmacology </option>
                <option value="Pharmaceutical Analysis"
                    {{ old('pharm_specialization', isset($data) ? $data->pharm_specialization : '') == 'Pharmaceutical Analysis' ? 'selected' : '' }}>
                    Pharmaceutical Analysis </option>

                <option value=" Drug Regulatory Affairs "
                    {{ old('pharm_specialization', isset($data) ? $data->pharm_specialization : '') == 'Drug Regulatory Affairs' ? 'selected' : '' }}>
                    Drug Regulatory Affairs </option>

                <option value="Post Baccalaureate Pharm D"
                    {{ old('pharm_specialization', isset($data) ? $data->pharm_specialization : '') == 'Post Baccalaureate Pharm D' ? 'selected' : '' }}>
                    Post Baccalaureate Pharm D</option>

                <option value="Natural Product Chemistry CNP"
                    {{ old('pharm_specialization', isset($data) ? $data->pharm_specialization : '') == 'Natural Product Chemistry CNP' ? 'selected' : '' }}>
                    Natural Product Chemistry CNP</option>

            </select>
            @error('gender')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

    </div>



    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
        <h1 class="col-span-3 text-center text-primary text-xl font-semibold uppercase">
            Address And Contact Detail of Working Place
        </h1>
        <div class="col-span-1">
            <label for="master_working">Name of Institution / University / Industry / Hospital / Regulatory Agency</label>
            <input type="text" name="master_working" id="master_working"
                class="form-input w-full @error('master_working') border-red-500 @enderror"
                value="{{ old('master_working', isset($data) ? $data->district : '') }}"
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'readonly' : '') : '' }}
                required>
            @error('master_working')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-span-1">
            <label for="district">District</label>
            <input type="text" name="district" id="district"
                class="form-input w-full @error('district') border-red-500 @enderror"
                value="{{ old('district', isset($data) ? $data->district : '') }}"
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'readonly' : '') : '' }}
                required>
            @error('district')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-span-1">
            <label for="municipality">Municipality/VDC</label>
            <input type="text" name="municipality" id="municipality"
                class="form-input w-full @error('municipality') border-red-500 @enderror"
                value="{{ old('municipality', isset($data) ? $data->municipality : '') }}"
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'readonly' : '') : '' }}
                required>
            @error('municipality')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-span-1">
            <label for="ward">Ward</label>
            <input type="text" name="ward" id="ward"
                class="form-input w-full @error('ward') border-red-500 @enderror"
                value="{{ old('ward', isset($data) ? $data->ward : '') }}"
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'readonly' : '') : '' }}
                required>
            @error('ward')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-span-1">
            <label for="tole">Tole</label>
            <input type="text" name="tole" id="tole"
                class="form-input w-full @error('tole') border-red-500 @enderror"
                value="{{ old('tole', isset($data) ? $data->tole : '') }}"
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved' ? 'readonly' : '') : '' }}
                required>
            @error('tole')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <h1 class="col-span-3 text-center text-primary text-xl font-semibold uppercase mt-2">
        Educational qualification </h1>
    <table class="qualification-table">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Qualification</th>
                <th>Collage</th>
                <th>Year (AD)</th>
                <th>Division</th>
                <th>Reg. no.</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>SLC or Equivalent</td>
                <td>
                    <input type="text" placeholder="Enter institute" name="slc_institute"
                        value="{{ old('slc_institute', isset($data) ? $data->slc_institute : '') }}"
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}
                        required>
                    @error('slc_institute')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="Year" name="slc_year"
                        value="{{ old('slc_year', isset($data) ? $data->slc_year : '') }}"
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}
                        required>
                    @error('slc_year')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="Grade" name="slc_grade"
                        value="{{ old('slc_grade', isset($data) ? $data->slc_grade : '') }}"
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}
                        required>
                    @error('slc_grade')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="Reg. no." name="slc_reg_no"
                        value="{{ old('slc_reg_no', isset($data) ? $data->slc_reg_no : '') }}"
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}
                        required>
                    @error('slc_reg_no')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="Remarks" name="slc_remarks"
                        value="{{ old('slc_remarks', isset($data) ? $data->slc_remarks : '') }}"
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}>
                    @error('slc_remarks')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Plus 2 or D. Pharmacy</td>
                <td>
                    <input type="text" placeholder="Enter institute" name="plus2_institute"
                        value="{{ old('plus2_institute', isset($data) ? $data->plus2_institute : '') }}"
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}
                        required>
                    @error('plus2_institute')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="Year" name="plus2_year"
                        value="{{ old('plus2_year', isset($data) ? $data->plus2_year : '') }}"
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}
                        required>
                    @error('plus2_year')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="Grade" name="plus2_grade"
                        value="{{ old('plus2_grade', isset($data) ? $data->plus2_grade : '') }}"
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}
                        required>
                    @error('plus2_grade')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="Reg. No." name="plus2_reg_no"
                        value="{{ old('plus2_reg_no', isset($data) ? $data->plus2_reg_no : '') }}"
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}
                        required>
                    @error('plus2_reg_no')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="Remarks" name="plus2_remarks"
                        value="{{ old('plus2_remarks', isset($data) ? $data->plus2_remarks : '') }}"
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}>
                    @error('plus2_remarks')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>B. Pharmacy</td>
                <td>
                    <input type="text" placeholder="Enter institute" name="bachelor_institute"
                        value="{{ old('bachelor_institute', isset($data) ? $data->bachelor_institute : '') }}"
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}>
                    @error('bachelor_institute')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="Year" name="bachelor_year"
                        value="{{ old('bachelor_year', isset($data) ? $data->bachelor_year : '') }}"
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}>
                    @error('bachelor_year')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="Grade" name="bachelor_grade"
                        value="{{ old('bachelor_grade', isset($data) ? $data->bachelor_grade : '') }}"
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}>
                    @error('bachelor_grade')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="Reg. No." name="bachelor_reg_no"
                        value="{{ old('bachelor_reg_no', isset($data) ? $data->bachelor_reg_no : '') }}"
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}>
                    @error('bachelor_reg_no')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="Remarks" name="bachelor_remarks"
                        value="{{ old('bachelor_remarks', isset($data) ? $data->bachelor_remarks : '') }}"
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}>
                    @error('bachelor_remarks')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>M. Pharmacy or Equivalent</td>
                <td>
                    <input type="text" placeholder="Enter institute" name="master_institute"
                        value="{{ old('master_institute', isset($data) ? $data->master_institute : '') }}"
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}>
                    @error('master_institute')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="Year" name="master_year"
                        value="{{ old('master_year', isset($data) ? $data->master_year : '') }}"
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}>
                    @error('master_year')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="Grade" name="master_grade"
                        value="{{ old('master_grade', isset($data) ? $data->master_grade : '') }}"
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}>
                    @error('master_grade')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="Reg. No." name="master_reg_no"
                        value="{{ old('master_reg_no', isset($data) ? $data->master_reg_no : '') }}"
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}>
                    @error('master_reg_no')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </td>
                <td>
                    <input type="text" placeholder="Remarks" name="master_remarks"
                        value="{{ old('master_remarks', isset($data) ? $data->master_remarks : '') }}"
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}>
                    @error('master_remarks')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
        </tbody>
    </table>



    <h1 class="col-span-3 text-center text-primary text-xl font-semibold uppercase mt-2">
        Required Documents
    </h1>
    <div class="document-note text-center" aria-live="polite" style="color:red;">
        <p>Documents should be in image format and should be less than 200KB.</p>
    </div>
    <h2 class="section-heading mt-2">Citizenship Document</h2>
    <div class="document-grid">
        <div class="document-item">
            <label for="citizenship_front">
                @isset($data->citizenship_front)
                    <img src="{{ getImage($data->citizenship_front) }}" alt="SLC MarkSheet">
                @endisset

                <p>Citizenship Front*</p>
            </label>
            <input type="file" id="citizenship_front" name="citizenship_front" accept="image/*"
                {{ !isset($data) && 'required' }}
                {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' }}
                max="204800">
            @error('citizenship_front')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="document-item">
            <label for="citizenship_back">
                @isset($data->citizenship_back)
                    <img src="{{ getImage($data->citizenship_back) }}" alt="SLC MarkSheet">
                @endisset
                <p>Citizenship Back*</p>
            </label>
            <input type="file" id="citizenship_back" name="citizenship_back" accept="image/*"
                {{ !isset($data) && 'required' }}
                {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' }}
                max="204800">
            @error('citizenship_back')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <h2 class="section-heading mt-5">Name Registration Certificate of NPC</h2>
    <div class="document-grid">
        <div class="document-item">
            <label for="name_registration_of_npc_front">
                @isset($data->name_registration_of_npc_front)
                    <img src="{{ getImage($data->name_registration_of_npc_front) }}" alt="Name Registration of npc">
                @endisset
                <p>Name Registration Certificate of NPC front*</p>
            </label>
            <input type="file" id="name_registration_of_npc_front" name="name_registration_of_npc_front"
                accept="image/*" value="{{ old('name_registration_of_npc_front') }}"
                {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' }}
                {{ !isset($data) && 'required' }} max="204800">
            @error('name_registration_of_npc_front')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="document-item">
            <label for="name_registration_of_npc_back">
                @isset($data->name_registration_of_npc_back)
                    <img src="{{ getImage($data->name_registration_of_npc_back) }}"
                        alt="Name Registration Certificate of NPC Back">
                @endisset
                <p>Name Registration Certificate of NPC Back*</p>
            </label>
            <input type="file" id="name_registration_of_npc_back" name="name_registration_of_npc_back"
                accept="image/*" value="{{ old('name_registration_of_npc_back') }}"
                {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' }}
                {{ !isset($data) && 'required' }} max="204800">
            @error('name_registration_of_npc_back')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>


    </div>


    <h2 class="section-heading mt-5">Master Documents </h2>
    <div class="document-grid">
        <div class="document-item">
            <label for="master_in_pharmacy_transcript_front">
                @isset($data->master_in_pharmacy_transcript_front)
                    <img src="{{ getImage($data->master_in_pharmacy_transcript_front) }}" alt="M.Pharma Transcript Front">
                @endisset
                <p>M. Pharma Transcript front*</p>
            </label>
            <input type="file" id="master_in_pharmacy_transcript_front" name="master_in_pharmacy_transcript_front"
                accept="image/*" value="{{ old('master_in_pharmacy_transcript_front') }}"
                {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' }}
                {{ !isset($data) && 'required' }} max="204800">
            @error('master_in_pharmacy_transcript_front')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="document-item">
            <label for="master_in_pharmacy_transcript_back">
                @isset($data->master_in_pharmacy_transcript_back)
                    <img src="{{ getImage($data->master_in_pharmacy_transcript_back) }}" alt="M.Pharma Transcript Back">
                @endisset
                <p>M.Pharma Transcript Back*</p>
            </label>
            <input type="file" id="master_in_pharmacy_transcript_back" name="master_in_pharmacy_transcript_back"
                accept="image/*" value="{{ old('master_in_pharmacy_transcript_back') }}"
                {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' }}
                {{ !isset($data) && 'required' }} max="204800">
            @error('master_in_pharmacy_transcript_back')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="document-item">
            <label for="experience_details">
                @isset($data->experience_details)
                    <img src="{{ getImage($data->experience_details) }}" alt="Experience Details">
                @endisset
                <p>Experience Details*</p>
            </label>
            <input type="file" id="experience_details" name="experience_details" accept="image/*"
                value="{{ old('experience_details') }}"
                {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' }}
                {{ !isset($data) && 'required' }} max="204800">
            @error('experience_details')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

    </div>

    <div class="npc__form-login-btn-container text-center mt-5">
        <button class="npc__form-login-btn" type="submit">
            Submit
        </button>
    </div>
    </form>

    <script>
        function toggleButton() {
            const yesRadio = document.querySelector('input[name="npc_enlisted"][value="yes"]');
            const newButtonContainer = document.getElementById("newButtonContainer");

            if (yesRadio.checked) {
                newButtonContainer.classList.add("hidden");
            } else {
                newButtonContainer.classList.remove("hidden");
            }
        }
    </script>
@endsection
