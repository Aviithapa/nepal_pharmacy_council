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
                            <td>National ID</td>
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
                </table>
                <div class="card-header mt-5">
                    <h5>Noc Applying  Information</h5>
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