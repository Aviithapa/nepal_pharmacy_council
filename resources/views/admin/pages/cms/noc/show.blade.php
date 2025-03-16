@extends('admin.layout.app')

@section('content')

<style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      overflow-x: auto; /* Enables horizontal scroll */
      overflow-y: hidden; /* Hides vertical scroll */
    }
    
    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #customers tr:nth-child(even){background-color: #f2f2f2;}
    
    #customers tr:hover {background-color: #ddd;}
    
    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }

    @media (max-width: 358px) {
        #customers td, #customers th {
            display: block;
            width: 100%;
            box-sizing: border-box;
        }
        
        #customers tr {
            margin-bottom: 1em;
            display: block;
        }
        
        #customers td::before {
            content: attr(data-title);
            font-weight: bold;
            display: block;
            margin-bottom: 0.5em;
        }
    }
    </style>

@include('admin.component.breadcrumb', ['title' => "Applicant Details"])
<div class=" card" >
    {{-- <h2>Applicant Details</h2> --}}

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Personal Information</h5>
                </div>
                <div class="card-body">
                    <table id="customers">
                        
                        <tr>
                          <td>Name</td>
                          <td>{{ $applicant->title . ' ' . $applicant->first_name . ' ' . $applicant->middle_name . ' ' . $applicant->last_name  }}</td>
                        </tr>
                        <tr>
                            <td>Name Nepali</td>
                            <td>{{ $applicant->title . ' ' . $applicant->first_name_nepali . ' ' . $applicant->middle_name_nepali . ' ' . $applicant->last_name_nepali  }}</td>
                        </tr>
                        <tr>
                            <td>Date of birth</td>
                            <td>{{ $applicant->dob_ad . ' AD ' . $applicant->dob_bs . ' BS'   }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{ $applicant->gender  }}</td>
                        </tr>
                        <tr>
                            <td>Citizenship</td>
                            <td>{{ $applicant->citizenship  }}</td>
                            
                        </tr>
                        <tr>
                            <td>Issued District</td>
                            <td>{{ $applicant->issued_district  }}</td>
                            
                        </tr>
                        <tr>
                            <td>Passport No</td>
                            <td>{{ $applicant->national_id  }}</td>
                        </tr>

                        <tr>
                            <td>Address</td>
                            <td>{{ $applicant->district . ' ' . $applicant->ward  . ' ' . $applicant->municipality . ' ' .   $applicant->tole }}</td>
                        </tr>
                        <tr>
                            <td>Father Name</td>
                            <td>{{ $applicant->father_name  }}</td>
                        </tr>
                        <tr>
                            <td>Mother Name</td>
                            <td>{{ $applicant->mother_name  }}</td>
                        </tr>
                        @if ($applicant->good_standing)
                            <tr>
                                <td>NPC Registration Number</td>
                                <td>{{ $applicant->registration_number  }}</td>
                            </tr>
                            <tr>
                                <td>Address to be applied</td>
                                <td>{{ $applicant->address_to_be_applied  }}</td>
                            </tr>
                            
                        @endif

                        @if ($applicant->good_standing)
                        <tr>
                            <td>Your Applied University Board / Email </td>
                            <td>{{ $applicant->email  }}</td>
                        </tr>
                        @else
                        <tr>
                            <td> Email </td>
                            <td>{{ $applicant->email  }}</td>
                        </tr>
                    @endif

                        

                        
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Educational Information</h5>
                </div>
                <div class="card-body">
                <table id="customers">
                    <tr>
                        <th>S.N.</th>
                        <th>Qualification</th>
                        <th>Institute</th>
                        <th>Year</th>
                        <th>Grade</th>
                        <th>Registration No.</th>
                        <th>Remarks</th>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>SLC</td>
                      <td>{{ $applicant->slc_institute }}</td>
                      <td>{{ $applicant->slc_year }}</td>
                      <td>{{ $applicant->slc_grade }}</td>
                      <td>{{ $applicant->slc_reg_no }}</td>
                      <td>{{ $applicant->slc_remarks}}</td>



                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Plus 2</td>
                        <td>{{ $applicant->plus2_institute }}</td>
                        <td>{{ $applicant->plus2_year }}</td>
                        <td>{{ $applicant->plus2_grade }}</td>
                        <td>{{ $applicant->plus2_reg_no }}</td>
                        <td>{{ $applicant->plus2_remarks}}</td>
  
  
  
                      </tr>
                      @if ($applicant->good_standing )
                      <tr>
                        <td>3</td>
                        <td>Bachelor</td>
                        <td>{{ $applicant->bachelor_institute }}</td>
                        <td>{{ $applicant->bachelor_year }}</td>
                        <td>{{ $applicant->bachelor_grade }}</td>
                        <td>{{ $applicant->bachelor_reg_no }}</td>
                        <td>{{ $applicant->bachelor_remarks}}</td>
  
  
  
                      </tr>
                      @endif
                    
                </table>
                <div class="card-header mt-5">
                    <h5>{{ $applicant->good_standing ? 'Good Standing Letter' : 'Noc Applying  Information' }}</h5>
                </div>
                <table id="customers">
                    <tr>
                        <th>S.N.</th>
                        <th>Applied College</th>
                        <th>Applied University</th>
                        <th>NPC Enlisted</th>
                         
                    </tr>
                    <tr>
                      <td>1</td>
                       
                      <td>{{ $applicant->applied_college }}</td>
                      <td>{{ $applicant->applied_university }}</td>
                      <td>{{ $applicant->npc_enlisted }}</td>
                       



                    </tr>
                    
                </table>
                </div>
            </div>

        </div>
        <div class="col-md-12">
            <div class="col-md-12 card mb-4">
                <div class="card-header">
                    <h5>Documents</h5>
                </div>
                <div class="card-body">
                    <table id="customers">
                        
                        <tr>
                            <td>Citizenship Front</td>
                            <td> <img src="{{  getImage($applicant->citizenship_front)}}" height="350px" /></td>
                        </tr>
                        <tr>
                            <td>Citizenship Back</td>
                            <td> <img src="{{  getImage($applicant->citizenship_back)}}" height="350px" /></td>
                        </tr>
                        <tr>
                            <td>Bank Voucher</td>
                            <td> <img src="{{  getImage($applicant->bank_voucher)}}" height="350px" /></td>
                        </tr>
                        @if ($applicant->good_standing)
                        <tr>
                            <td>Passport Front</td>
                            <td> <img src="{{  getImage($applicant->passport_front)}}" height="350px" /></td>
                        </tr>
                        <tr>
                            <td>Passport Back</td>
                            <td> <img src="{{  getImage($applicant->passport_back)}}" height="350px" /></td>
                        </tr>
                        @else
                        <tr>
                            <td>Offer Letter</td>
                            <td> <img src="{{  getImage($applicant->offer_letter)}}" height="350px" /></td>
                        </tr>
                        @endif
                    </table>
                    <div class="card-header">
                        <h5>SlC Documents</h5>
                    </div>

                    <table id="customers">
                        
                        <tr>
                            <td>SLC Mark Sheet</td>
                            <td><img src="{{ getImage($applicant->slc_marksheet) }}" height="350px" /></td>
                        </tr>
                        <tr>
                            <td>SLC Provisional </td>
                            <td><img src="{{ getImage($applicant->slc_provisional) }}" height="350px" /></td>
                        </tr>
                        <tr>
                            <td>SLC Character</td>
                            <td><img src="{{ getImage($applicant->slc_character) }}" height="350px" /></td>
                        </tr>
                        <tr>
                            <td>SLC Equivalence</td>
                            <td><img src="{{ getImage($applicant->equivalence) }}" height="350px" /></td>
                        </tr>
                    </table>

                    <div class="card-header">
                        <h5>Plus 2 Documents</h5>
                    </div>

                    <table id="customers">
                        
                        <tr>
                            <td>Plus 2 Mark Sheet</td>
                            <td><img src="{{ getImage($applicant->plus2_marksheet) }}" height="350px" /></td>
                        </tr>
                        <tr>
                            <td>Plus 2 Provisional </td>
                            <td><img src="{{ getImage($applicant->plus2_provisional) }}" height="350px" /></td>
                        </tr>
                        <tr>
                            <td>Plus 2 Character</td>
                            <td><img src="{{ getImage($applicant->plus2_character) }}" height="350px" /></td>
                        </tr>
                        <tr>
                            <td>Plus 2 Equivalence</td>
                            <td><img src="{{ getImage($applicant->plus2_equivalence) }}" height="350px" /></td>
                        </tr>
                    </table>

                    @if ($applicant->good_standing)

                    <div class="card-header">
                        <h5>Name Registration Certificate NPC</h5>
                    </div>

                    <table id="customers">
                        
                        <tr>
                            <td>Name Registration Certificate NPC Front</td>
                            <td><img src="{{ getImage($applicant->name_registration_of_npc) }}" height="350px" /></td>
                        </tr>
                        <tr>
                            <td>Name Registration Certificate NPC Back </td>
                            <td><img src="{{ getImage($applicant->name_registration_of_npc_back) }}" height="350px" /></td>
                        </tr>
                        
                        
                    </table>

                    <div class="card-header">
                        <h5>Bachelor Documents</h5>
                    </div>

                    <table id="customers">
                        
                        <tr>
                            <td>Bachelor Transcript</td>
                            <td><img src="{{ getImage($applicant->bachelor_transcript) }}" height="350px" /></td>
                        </tr>
                        <tr>
                            <td>Bachelor Provisional </td>
                            <td><img src="{{ getImage($applicant->bachelor_provisional) }}" height="350px" /></td>
                        </tr>
                        <tr>
                            <td>Bachelor Character</td>
                            <td><img src="{{ getImage($applicant->bachelor_character) }}" height="350px" /></td>
                        </tr>
                        <tr>
                            <td>Bachelor Equivalence</td>
                            <td><img src="{{ getImage($applicant->bachelor_equivalence) }}" height="350px" /></td>
                        </tr>
                    </table>
                    @endif
                   

                  
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Additional Details Adding</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('applicant.store') }}" method="POST" class="max-w-lg mx-auto p-6 bg-white rounded shadow-md">
                        @csrf <!-- CSRF protection token -->
                   
                <table id="customers">
                    <tr>
                         
                        <th>Ref Number</th>
                        <th>Registration Type</th>
                        <th>Dob</th>
                    </tr>
                    <tr>
                     
                      <td>
                        <input 
                            type="hidden" 
                            placeholder="Registration Type" 
                            name="applicant_id" 
                            value="{{ old('applicant_id', isset($applicant) ? $applicant->id : '') }}" 
                        
                        >
                        <input 
                            type="text" 
                            placeholder="Ref Number" 
                            name="ref" 
                            style="padding: 5px; font-size:16px;"
                            value="{{ old('ref', isset($applicant) ? $applicant->ref : '') }}" 

                        
                        >
                        @error('ref')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                        </td>
                        <td>
                            <select 
                                name="position" 
                                style="padding: 5px; font-size:16px;" >
                                <option value="" disabled {{ old('position', isset($applicant) ? $applicant->position : '') === '' ? 'selected' : '' }}>
                                    Select Position
                                </option>
                                <option 
                                    value="Pharmacist" 
                                    {{ old('position', isset($applicant) ? $applicant->position : '') === 'Pharmacist' ? 'selected' : '' }}
                                >
                                    Pharmacist
                                </option>
                                <option 
                                    value="Pharmacy Assistant" 
                                    {{ old('position', isset($applicant) ? $applicant->position : '') === 'Pharmacy Assistant' ? 'selected' : '' }}
                                >
                                Pharmacy Assistant
                                </option>
                            </select>
                            @error('position')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                            
                        </td>
                        <td>
                            <input 
                                type="text" 
                                placeholder="Dob" 
                                name="dob_ad" 
                                style="padding: 5px; font-size:16px;"
                                value="{{ old('dob_en', isset($applicant) ? $applicant->dob_ad : '') }}" 

                            >
                            @error('dob_ad')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                       
                        <td>
                            <select 
                                name="level" 
                                style="padding: 5px; font-size:16px;" 
                                >
                                <option value="" disabled {{ old('level', isset($applicant) ? $applicant->level : '') === '' ? 'selected' : '' }}>
                                    Select Level
                                </option>
                                <option 
                                    value="Doctor of Pharmacy" 
                                    {{ old('level', isset($applicant) ? $applicant->level : '') === 'Doctor of Pharmacy' ? 'selected' : '' }}
                                >
                                    Doctor of Pharmacy 
                                </option>
                                <option 
                                    value="Bachelor of Pharmacy (B. Pharma)" 
                                    {{ old('level', isset($applicant) ? $applicant->level : '') === 'Bachelor of Pharmacy (B. Pharma)' ? 'selected' : '' }}
                                >
                                    Bachelor of Pharmacy (B. Pharma)
                                </option>
                                <option 
                                    value="Diploma of Pharmacy (D. Pharma)" 
                                    {{ old('level', isset($applicant) ? $applicant->level : '') === 'Diploma of Pharmacy (D. Pharma)' ? 'selected' : '' }}
                                >
                                    Diploma of Pharmacy (D. Pharma)
                                </option>
                            </select>
                            @error('level')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </td>
                        
                        <td>
                            <input 
                                  type="text" 
                                  placeholder="University" 
                                  name="university" 
                                  style="padding: 5px; font-size:16px;"
                                  value="{{ old('university', isset($applicant) ? $applicant->university : '') }}" 
                                  
  
                              >
                              @error('university')
                                  <span class="text-red-500 text-sm">{{ $message }}</span>
                              @enderror
                          </td>
                          <td>
                              <input 
                                  type="text" 
                                  placeholder="Registrar Name" 
                                  name="registrar_name" 
                                  style="padding: 5px; font-size:16px;"
                                  value="{{ old('registrar_name', isset($applicant) ? $applicant->registrar_name : '') }}" 
                                
  
                              >
                              @error('registrar_name')
                                  <span class="text-red-500 text-sm">{{ $message }}</span>
                              @enderror
                          </td>
                          
                      </tr>
                      <tr>
                        <td>
                            <input 
                                type="text" 
                                placeholder="Passed Year" 
                                name="passed_year" 
                                style="padding: 5px; font-size:16px;"
                                value="{{ old('passed_year', isset($applicant) ? $applicant->passed_year : '') }}" 
                               

                            >
                            @error('passed_year')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                          </td>
                      </tr>
                </table>
                <div class="mt-6">
                    
                        <button 
                            type="submit" 
                            class="w-full  text-white py-2 px-4"
                            style="background: #04AA6D; font-size: 18px; margin-top:10px; border:none;"
                            >
                            Submit
                        </button>
                    
               
                </div>
                </form>
                </div>
            </div>

           
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script> 
     const exampleModal = document.getElementById('exampleModal')
     exampleModal.addEventListener('show.bs.modal', event => {
     const button = event.relatedTarget
     const recipient = button.getAttribute('data-attr')
      document.getElementById('deleteForm').action = recipient; 
     })
</script>
    
@endpush