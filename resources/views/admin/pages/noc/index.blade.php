
@extends('admin.layout.app')
<link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
<style>
    .blink {
    animation: blink-animation 1s step-start infinite;
}

@keyframes blink-animation {
    0% { opacity: 0; }
    50% { opacity: 1; }
    100% { opacity: 0; }
}
</style>
@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<div class="" style="padding: 15px; background: lightyellow; margin: 10px 0px; border-left: 4px solid yellow;">
  <p style="font-weight: 700; font-size:26px; color: black;">NOC Certificate Form</p>

  Make sure you associate with correct details. Once the information is confirmed, it cannot be changed.
</div>

@isset($data)
    @if ($data->status === 'pending')
    <div style="padding: 15px; background: lightyellow; margin: 10px 0px; border-left: 4px solid yellow;">
        <p style="font-weight: 700; font-size: 26px; color: black;">Your form has been successfully submitted.</p>
        <p>Please wait while the council processes your request. You will be notified once there is any update.</p>
    </div>
    @elseif ($data->status === 'approved')
    <div style="padding: 15px; background: lightgreen; margin: 10px 0px; border-left: 4px solid green;">
        <p style="font-weight: 700; font-size: 26px; color: black;">Your NOC has been approved and generated.</p>
        {{-- <p style="font-weight: 700; font-size: 26px; color: black;">The file is attached send to the mail.</p> --}}

        {{-- <p>Please click here to download your NOC. <a href="{{ getImage($data->pdf_link) }}" target="_blank" class="blink" style="color: blue;">Download Now </a></p> --}}
    </div>
    @elseif ($data->status === 'rejected')
    <div style="padding: 15px; background: rgb(255, 185, 185); margin: 10px 0px; border-left: 4px solid red;">
        <p style="font-weight: 700; font-size: 26px; color: black;">Your NOC has been rejected.</p>
        <p>{{ $data->remarks }}</p>
    </div>
    @endif
@endisset

@if(isset($data))
<form 
action="{{ route('noc.update', ['noc' => $data->id ]) }}"
enctype="multipart/form-data"
 method="POST" class="gap-2  py-12" style=" background: white; padding: 10px;">
 @method('PUT')
@else
<form 
action="{{ route('noc.store') }}"
enctype="multipart/form-data"
 method="POST" class="gap-2  py-12" style=" background: white; padding: 10px;">
 @endif

    @csrf
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <h1 class="col-span-3 text-center text-primary text-xl font-semibold uppercase">
            Personal Information
        </h2>
        <div class="col-span-1">
            <label for="firstNameNepali">देवनागरी मा पहिलो नाम            </label>
            <input 
                type="text" 
                name="first_name_nepali" 
                id="firstName" 
                class="form-input w-full" 
                placeholder="First Name" 
                value="{{ isset($data) ? $data->first_name_nepali : old('first_name_nepali') }}" 
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' : '' }}
                required
            >
            @error('first_name_nepali')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="col-span-1">
            <label for="middleNameNepali">देवनागरी मा बीचको नाम</label>
            <input 
                type="text" 
                name="middle_name_nepali" 
                id="middleName" 
                class="form-input w-full" 
                placeholder="Middle Name" 
                value="{{ isset($data) ? $data->middle_name_nepali : old('middle_name_nepali') }}" 
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' : '' }}
            >
            @error('middle_name_nepali')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="col-span-1">
            <label for="lastNameNepali">थर</label>
            <input 
                type="text" 
                name="last_name_nepali" 
                id="lastNameNepali" 
                class="form-input w-full" 
                placeholder="Last Name" 
                value="{{ isset($data) ? $data->last_name_nepali : old('last_name_nepali') }}" 
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' : '' }}
                required
            >
            @error('last_name_nepali')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-5">
            <div class="col-span-1">
                <label for="title">Title</label>
                <select 
                    name="title" 
                    id="title" 
                    class="form-select w-full @error('title') border-red-500 @enderror" 
                    {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' : '' }}
                    required
                >
                    <option value="" {{ old('title') == '' ? 'selected' : '' }}>Select Title</option>
                    <option value="mr" {{ old('title') == 'mr' || (isset($data) && $data->title === 'mr') ? 'selected' : '' }}>Mr</option>
        <option value="ms" {{ old('title') == 'ms' || (isset($data) && $data->title === 'ms') ? 'selected' : '' }}>Ms</option>
        <option value="mrs" {{ old('title') == 'mrs' || (isset($data) && $data->title === 'mrs') ? 'selected' : '' }}>Mrs</option>
                </select>
                @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        
            <div class="col-span-1">
                <label for="firstName">First Name in English</label>
                <input 
                    type="text" 
                    name="first_name" 
                    id="firstName" 
                    class="form-input w-full" 
                    placeholder="First Name" 
                    value="{{ isset($data) ? $data->first_name : old('first_name') }}" 
                    {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' : '' }}
                    required
                >
                @error('first_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        
            <div class="col-span-1">
                <label for="middleName">Middle Name in English</label>
                <input 
                    type="text" 
                    name="middle_name" 
                    id="middleName" 
                    class="form-input w-full" 
                    placeholder="Middle Name" 
                    value="{{ isset($data) ? $data->middle_name : old('middle_name') }}" 
                    {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' : '' }}
                >
                @error('middle_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        
            <div class="col-span-1">
                <label for="lastName">Last Name in English</label>
                <input 
                    type="text" 
                    name="last_name" 
                    id="lastName" 
                    class="form-input w-full" 
                    placeholder="Last Name" 
                    value="{{ isset($data) ? $data->last_name : old('last_name') }}" 
                    {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' : '' }}
                    required
                >
                @error('last_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

     
        <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
            <!-- Date of Birth AD -->
            <div class="col-span-2">
                <label for="dob_ad">Date Of Birth -- AD (जन्म मिति) (YYYY-MM-DD)</label>
                <input 
                    type="text" 
                    name="dob_ad" 
                    id="dob_ad" 
                    class="form-input w-full @error('dob_ad') border-red-500 @enderror" 
                    placeholder="YYYY-MM-DD" 
                    value="{{ old('dob_ad', isset($data) ? $data->dob_ad : '') }}" 
                    {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' : '' }}
                    required
                >
                @error('dob_ad')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        
            <!-- Date of Birth BS -->
            <div class="col-span-2">
                <label for="dob_bs">Date Of Birth -- BS (जन्म मिति)</label>
                <input 
                    type="text" 
                    name="dob_bs" 
                    id="dob_bs" 
                    class="form-input w-full @error('dob_bs') border-red-500 @enderror" 
                    placeholder="YYYY-MM-DD" 
                    value="{{ old('dob_bs', isset($data) ? $data->dob_bs : '') }}" 
                    {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' : '' }}
                    required
                >
                @error('dob_bs')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        
            <!-- Father Name -->
            <div class="col-span-2">
                <label for="father_name">Father Name (बुबाको नाम)</label>
                <input 
                    type="text" 
                    name="father_name" 
                    id="father_name" 
                    class="form-input w-full @error('father_name') border-red-500 @enderror" 
                    value="{{ old('father_name', isset($data) ? $data->father_name : '') }}" 
                    {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' : '' }}
                    required
                >
                @error('father_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        
            <!-- Mother Name -->
            <div class="col-span-2">
                <label for="mother_name">Mother Name (आमाको नाम)</label>
                <input 
                    type="text" 
                    name="mother_name" 
                    id="mother_name" 
                    class="form-input w-full @error('mother_name') border-red-500 @enderror" 
                    value="{{ old('mother_name', isset($data) ? $data->mother_name : '') }}" 
                    {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' : '' }}
                    required
                >
                @error('mother_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        
            <!-- Gender -->
            <div class="col-span-2">
                <label for="gender">Gender</label>
                <select 
                    name="gender" 
                    id="gender" 
                    class="form-select w-full @error('gender') border-red-500 @enderror" 
                    {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' : '' }} 
                    required
                >
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender', isset($data) ? $data->gender : '') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', isset($data) ? $data->gender : '') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender', isset($data) ? $data->gender : '') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        
            <!-- Citizenship Number -->
            <div class="col-span-2">
                <label for="citizenship">Citizenship Number</label>
                <input 
                    type="text" 
                    name="citizenship" 
                    id="citizenship" 
                    class="form-input w-full @error('citizenship') border-red-500 @enderror" 
                    value="{{ old('citizenship', isset($data) ? $data->citizenship : '') }}" 
                    {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' : '' }}
                    required
                >
                @error('citizenship')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        
            <!-- National ID -->
            <div class="col-span-2">
                <label for="national_id">Passport  No</label>
                <input 
                    type="text" 
                    name="national_id" 
                    id="national_id" 
                    class="form-input w-full @error('national_id') border-red-500 @enderror" 
                    value="{{ old('national_id', isset($data) ? $data->national_id : '') }}" 
                    {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' : '' }}
                    
                >
                @error('national_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        
            <!-- Issued District -->
            <div class="col-span-2">
                <label for="issued_district">Issued District</label>
                <input 
                    type="text" 
                    name="issued_district" 
                    id="issued_district" 
                    class="form-input w-full @error('issued_district') border-red-500 @enderror" 
                    value="{{ old('issued_district', isset($data) ? $data->issued_district : '') }}" 
                    {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' : '' }}
                    required
                >
                @error('issued_district')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

              <!-- Email Address -->
              <div class="col-span-2">
                <label for="email">Your email  </label>
                <input 
                    type="text" 
                    name="email" 
                    id="email" 
                    class="form-input w-full @error('email') border-red-500 @enderror" 
                    value="{{ old('email', isset($data) ? $data->email : '') }}" 
                    {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' : '' }}
                    required
                >
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        
  
  
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
            <h1 class="col-span-3 text-center text-primary text-xl font-semibold uppercase">
                Address And Contact Detail
            </h1>
            <div class="col-span-1">
                <label for="district">District</label>
                <input type="text" name="district" id="district" class="form-input w-full @error('district') border-red-500 @enderror" 
                value="{{ old('district', isset($data) ? $data->district : '') }}" 
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' : '' }} 
                required>
                @error('district')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-span-1">
                <label for="municipality">Municipality/VDC</label>
                <input type="text" name="municipality" id="municipality" class="form-input w-full @error('municipality') border-red-500 @enderror" 
                value="{{ old('municipality', isset($data) ? $data->municipality : '') }}" 
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' : '' }} 
                required>
                @error('municipality')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-span-1">
                <label for="ward">Ward</label>
                <input type="text" name="ward" id="ward" class="form-input w-full @error('ward') border-red-500 @enderror" 
                value="{{ old('ward', isset($data) ? $data->ward : '') }}" 
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' : '' }} 
                required>
                @error('ward')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-span-1">
                <label for="tole">Tole</label>
                <input type="text" name="tole" id="tole" class="form-input w-full @error('tole') border-red-500 @enderror" 
                value="{{ old('tole', isset($data) ? $data->tole : '') }}" 
                {{ isset($data) ? ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' : '' }} 
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
              <input 
                  type="text" 
                  placeholder="Enter institute" 
                  name="slc_institute" 
                  value="{{ old('slc_institute', isset($data) ? $data->slc_institute : '') }}" 
                  {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }} 
                  required
              >
              @error('slc_institute')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </td>
            <td>
              <input 
                  type="text" 
                  placeholder="Year" 
                  name="slc_year" 
                  value="{{ old('slc_year', isset($data) ? $data->slc_year : '') }}" 
                  {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }} 
                  required
              >
              @error('slc_year')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </td>
            <td>
              <input 
                  type="text" 
                  placeholder="Grade"  
                  name="slc_grade" 
                  value="{{ old('slc_grade', isset($data) ? $data->slc_grade : '') }}" 
                  {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }} 
                  required
              >
              @error('slc_grade')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </td>
            <td>
              <input 
                  type="text" 
                  placeholder="Reg. no." 
                  name="slc_reg_no" 
                  value="{{ old('slc_reg_no', isset($data) ? $data->slc_reg_no : '') }}" 
                  {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }} 
                  required
              >
              @error('slc_reg_no')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </td>
            <td>
              <input 
                  type="text" 
                  placeholder="Remarks" 
                  name="slc_remarks" 
                  value="{{ old('slc_remarks', isset($data) ? $data->slc_remarks : '') }}" 
                  {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}
              >
              @error('slc_remarks')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Plus 2 or Equivalent</td>
            <td>
              <input 
                  type="text" 
                  placeholder="Enter institute" 
                  name="plus2_institute" 
                  value="{{ old('plus2_institute', isset($data) ? $data->plus2_institute : '') }}" 
                  {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }} 
                  required
              >
              @error('plus2_institute')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </td>
            <td>
              <input 
                  type="text" 
                  placeholder="Year" 
                  name="plus2_year" 
                  value="{{ old('plus2_year', isset($data) ? $data->plus2_year : '') }}" 
                  {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }} 
                  required
              >
              @error('plus2_year')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </td>
            <td>
              <input 
                  type="text" 
                  placeholder="Grade" 
                  name="plus2_grade" 
                  value="{{ old('plus2_grade', isset($data) ? $data->plus2_grade : '') }}" 
                  {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }} 
                  required
              >
              @error('plus2_grade')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </td>
            <td>
              <input 
                  type="text" 
                  placeholder="Reg. No." 
                  name="plus2_reg_no" 
                  value="{{ old('plus2_reg_no', isset($data) ? $data->plus2_reg_no : '') }}" 
                  {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }} 
                  required
              >
              @error('plus2_reg_no')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </td>
            <td>
              <input 
                  type="text" 
                  placeholder="Remarks" 
                  name="plus2_remarks" 
                  value="{{ old('plus2_remarks', isset($data) ? $data->plus2_remarks : '') }}" 
                  {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}
              >
              @error('plus2_remarks')
                  <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </td>
          </tr>
        </tbody>
      </table>
    
      <h1 class="col-span-3 text-center text-primary text-xl font-semibold uppercase mt-2">
        Additional Information
      </h1>
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <div class="col-span-1">
            <label for="applied_college">Applied College</label>
            <input 
                type="text" 
                name="applied_college" 
                id="applied_college" 
                class="form-input w-full" 
                value="{{ old('applied_college', isset($data) ? $data->applied_college : '') }}" 
                {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }} 
                required
            >
            @error('applied_college')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="col-span-1">
            <label for="applied_university">Applied University</label>
            <input 
                type="text" 
                name="applied_university" 
                id="applied_university" 
                class="form-input w-full" 
                value="{{ old('applied_university', isset($data) ? $data->applied_university : '') }}" 
                {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }} 
                required
            >
            @error('applied_university')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="col-span-1">
            <label for="npc_enlisted" class="block font-medium text-gray-700">
                College/University Enlisted in NPC
            </label>
            <div class="flex items-center space-x-4 mt-2">
                <label class="flex items-center">
                    <input 
                        type="radio" 
                        name="npc_enlisted" 
                        value="yes" 
                        class="form-radio h-5 w-5 text-blue-600 border-gray-300 focus:ring-blue-500" 
                        {{ old('npc_enlisted', isset($data) ? $data->npc_enlisted : '') == 'yes' ? 'checked' : '' }}
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}
                    >
                    <span class="ml-2 text-gray-700">Yes</span>
                </label>
                <label class="flex items-center">
                    <input 
                        type="radio" 
                        name="npc_enlisted" 
                        value="no" 
                        class="form-radio h-5 w-5 text-blue-600 border-gray-300 focus:ring-blue-500" 
                        {{ old('npc_enlisted', isset($data) ? $data->npc_enlisted : '') == 'no' ? 'checked' : '' }}
                        {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'readonly' : '' }}
                    >
                    <span class="ml-2 text-gray-700">No</span>
                </label>
            </div>
            @error('npc_enlisted')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
      </div>
    
  

      <h1 class="col-span-3 text-center text-primary text-xl font-semibold uppercase mt-2">
        Documents
     </h1>
     <div class="document-note text-center" aria-live="polite" style="color:red;" >
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
            <input 
                type="file" 
                id="citizenship_front" 
                name="citizenship_front" 
                accept="image/*"
                {{ !isset($data) && 'required' }}
                 {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' }}

                max="204800"
            >
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
            <input 
                type="file" 
                id="citizenship_back" 
                name="citizenship_back" 
                accept="image/*"
                {{ !isset($data) && 'required' }}

                 {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' }}

                max="204800"
            >
            @error('citizenship_back')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>
    
  
      <h2 class="section-heading mt-5">SLC DOCUMENT</h2>
      <div class="document-grid">
        <div class="document-item">
            <label for="slc_marksheet">
                
                @isset($data->slc_marksheet)
                    
                <img src="{{ getImage($data->slc_marksheet) }}" alt="SLC MarkSheet">
                @endisset
                <p>SLC MarkSheet*</p>
            </label>
            <input 
                type="file" 
                id="slc_marksheet" 
                name="slc_marksheet" 
                accept="image/*"
                value="{{ old('slc_marksheet') }}"
                {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' }}

                {{ !isset($data) && 'required' }}

                max="204800"
            >
            @error('slc_marksheet')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    
        <div class="document-item">
            <label for="slc_provisional">
                @isset($data->slc_provisional)
                    
                <img src="{{ getImage($data->slc_provisional) }}" alt="slc_provisional">
                @endisset
                <p>SLC Provisional*</p>
            </label>
            <input 
                type="file" 
                id="slc_provisional" 
                name="slc_provisional" 
                accept="image/*"
                {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' }}

                value="{{ old('slc_provisional') }}"
                {{ !isset($data) && 'required' }}

                max="204800"
            >
            @error('slc_provisional')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    
        <div class="document-item">
            <label for="slc_character">
                @isset($data->slc_character)
                    
                <img src="{{ getImage($data->slc_character) }}" alt="slc_character">
                @endisset
                <p>SLC Character*</p>
            </label>
            <input 
                type="file" 
                id="slc_character" 
                name="slc_character" 
                accept="image/*"
                value="{{ old('slc_character') }}"
                {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' }}

                {{ !isset($data) && 'required' }}

                max="204800"
            >
            @error('slc_character')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    
        <div class="document-item">
            <label for="equivalence">
                @isset($data->equivalence)
                    
                <img src="{{ getImage($data->equivalence) }}" alt="equivalence">
                @endisset
                <p>Equivalence (in case of foreign college)</p>
            </label>
            <input 
                type="file" 
                id="equivalence" 
                name="equivalence" 
                accept="image/*"
                value="{{ old('equivalence') }}"
                {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' }}

                {{-- required --}}
                max="204800"
            >
            @error('equivalence')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>
    

      <h2 class="section-heading mt-5"> Plus 2 Document    </h2>
      <div class="document-grid">
    <div class="document-item">
        <label for="plus2_marksheet">
            @isset($data->plus2_marksheet)
                    
            <img src="{{ getImage($data->plus2_marksheet) }}" alt="plus2 MarkSheet">
            @endisset
            <p>Plus 2 MarkSheet*</p>
        </label>
        <input 
            type="file" 
            id="plus2_marksheet" 
            name="plus2_marksheet" 
            accept="image/*"
            value="{{ old('plus2_marksheet') }}"
            {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' }}

            {{ !isset($data) && 'required' }}

            max="204800"
        >
        @error('plus2_marksheet')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

      <div class="document-item">
          <label for="plus2_provisional">
            @isset($data->plus2_provisional)
                    
            <img src="{{ getImage($data->plus2_provisional) }}" alt="plus2_provisional">
            @endisset
              <p>Plus 2 Provisional*</p>
          </label>
          <input 
              type="file" 
              id="plus2_provisional" 
              name="plus2_provisional" 
              accept="image/*"
              value="{{ old('plus2_provisional') }}"
              {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' }}

              {{ !isset($data) && 'required' }}

              max="204800"
          >
          @error('plus2_provisional')
              <span class="text-red-500 text-sm">{{ $message }}</span>
          @enderror
      </div>

      <div class="document-item">
          <label for="plus2_character">
            @isset($data->plus2_character)
                    
            <img src="{{ getImage($data->plus2_character) }}" alt="plus2_character">
            @endisset
              <p>Plus 2 Character*</p>
          </label>
          <input 
              type="file" 
              id="plus2_character" 
              name="plus2_character" 
              accept="image/*"
              value="{{ old('plus2_character') }}"
              {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' }}

              {{ !isset($data) && 'required' }}

              max="204800"
          >
          @error('plus2_character')
              <span class="text-red-500 text-sm">{{ $message }}</span>
          @enderror
      </div>

      <div class="document-item">
          <label for="plus2_equivalence"> 
            @isset($data->plus2_equivalence)
                    
            <img src="{{ getImage($data->plus2_equivalence) }}" alt="plus2_equivalence">
            @endisset
              <p>Equivalence (in case of foreign college)</p>
          </label>
          <input 
              type="file" 
              id="plus2_equivalence" 
              name="plus2_equivalence" 
              accept="image/*"
              value="{{ old('plus2_equivalence') }}"
              {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' }}

              {{-- required --}}
              max="204800"
          >
          @error('plus2_equivalence')
              <span class="text-red-500 text-sm">{{ $message }}</span>
          @enderror
      </div>
  </div>

      <h2 class="section-heading mt-5">Bank Voucher</h2>
      <div class="document-grid">
        <div class="document-item">
          <label for="bank_voucher">
            @isset($data->bank_voucher)
                    
            <img src="{{ getImage($data->bank_voucher) }}" alt="Bank Voucher">
            @endisset
            <p>Bank Voucher*</p>
        </label>
        <input 
            type="file" 
            id="bank_voucher" 
            name="bank_voucher" 
            accept="image/*"
            value="{{ old('bank_voucher') }}"
            {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' }}
     
            {{ !isset($data) && 'required' }}

            
            max="204800"
        >
        @error('bank_voucher')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
        </div>
         
        
        
      </div>

      <h2 class="section-heading mt-5">Offer Letter</h2>
      <div class="document-grid">
        <div class="document-item">
          <label for="offer_letter">
            @isset($data->offer_letter)
                    
            <img src="{{ getImage($data->offer_letter) }}" alt="Offer Letter">
            @endisset
            <p>Offer Letter*</p>
        </label>
        <input 
            type="file" 
            id="offer_letter" 
            name="offer_letter" 
            accept="image/*"
            value="{{ old('offer_letter') }}"
            {{ isset($data) && ($data->status === 'pending' || $data->status === 'approved') ? 'disabled' : '' }}
     
            {{ !isset($data) && 'required' }}

            
            max="204800"
        >
        @error('offer_letter')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
        </div>
         
        
        
      </div>

      <div style="display: flex; flex-direction: column; justify-content:center; text-align: center; font-size:16px; margin-top:10px;">
        <p style=" font-weight: 700; font-size: 20px;">* Deposit Detail:  </p>
Good Standing Letter: Nrs 500<br/>
Noc: Nrs 500<br/><br />

<p style=" font-weight: 700; font-size: 20px;">* Bank Detail:</p>
Bank: NABIL Bank<br/>
A/C Holder's Name: Nepal Pharmacy Council<br/>
Account Number: 17301017500573<br/>
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

