@extends('admin.layout.app')

@section('content')
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            overflow-x: auto;
            /* Enables horizontal scroll */
            overflow-y: hidden;
            /* Hides vertical scroll */
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        @media (max-width: 358px) {

            #customers td,
            #customers th {
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

    @include('admin.component.breadcrumb', ['title' => 'Applicant Details'])
    <div class=" card">
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
                                <td>{{ $applicant->title . ' ' . $applicant->first_name . ' ' . $applicant->middle_name . ' ' . $applicant->last_name }}
                                </td>
                            </tr>
                            <tr>
                                <td>Name Nepali</td>
                                <td>{{ $applicant->title . ' ' . $applicant->first_name_nepali . ' ' . $applicant->middle_name_nepali . ' ' . $applicant->last_name_nepali }}
                                </td>
                            </tr>
                            <tr>
                                <td>Date of birth</td>
                                <td>{{ $applicant->dob_ad . ' AD ' . $applicant->dob_bs . ' BS' }}</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>{{ $applicant->gender }}</td>
                            </tr>
                            <tr>
                                <td>Citizenship</td>
                                <td>{{ $applicant->citizenship }}</td>

                            </tr>
                            <tr>
                                <td>Issued District</td>
                                <td>{{ $applicant->issued_district }}</td>

                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $applicant->district . ' ' . $applicant->ward . ' ' . $applicant->municipality . ' ' . $applicant->tole }}
                                </td>
                            </tr>
                            <tr>
                                <td>Father Name</td>
                                <td>{{ $applicant->father_name }}</td>
                            </tr>
                            <tr>
                                <td>Mother Name</td>
                                <td>{{ $applicant->mother_name }}</td>
                            </tr>

                            <tr>
                                <td>NPC Registration Number</td>
                                <td>{{ $applicant->npc_registration_number }}</td>
                            </tr>
                            <tr>
                                <td>NPC Registration Date</td>
                                <td>{{ $applicant->npc_registration_number }}</td>
                            </tr>
                            <tr>
                                <td>Specialization</td>
                                <td>{{ $applicant->pharm_specialization }}</td>
                            </tr>
                            <tr>
                                <td>Working Details</td>
                                <td>{{ $applicant->master_working }}</td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td>{{ $applicant->user->email }}</td>
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
                                <td>{{ $applicant->slc_remarks }}</td>

                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Plus 2</td>
                                <td>{{ $applicant->plus2_institute }}</td>
                                <td>{{ $applicant->plus2_year }}</td>
                                <td>{{ $applicant->plus2_grade }}</td>
                                <td>{{ $applicant->plus2_reg_no }}</td>
                                <td>{{ $applicant->plus2_remarks }}</td>



                            </tr>

                            <tr>
                                <td>3</td>
                                <td>Bachelor</td>
                                <td>{{ $applicant->bachelor_institute }}</td>
                                <td>{{ $applicant->bachelor_year }}</td>
                                <td>{{ $applicant->bachelor_grade }}</td>
                                <td>{{ $applicant->bachelor_reg_no }}</td>
                                <td>{{ $applicant->bachelor_remarks }}</td>



                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Master</td>
                                <td>{{ $applicant->master_institute }}</td>
                                <td>{{ $applicant->master_year }}</td>
                                <td>{{ $applicant->master_grade }}</td>
                                <td>{{ $applicant->master_reg_no }}</td>
                                <td>{{ $applicant->master_remarks }}</td>



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
                                <td> <img src="{{ getImage($applicant->citizenship_front) }}" height="350px" /></td>
                            </tr>
                            <tr>
                                <td>Citizenship Back</td>
                                <td> <img src="{{ getImage($applicant->citizenship_back) }}" height="350px" /></td>
                            </tr>

                        </table>







                        <div class="card-header">
                            <h5>Name Registration Certificate NPC</h5>
                        </div>

                        <table id="customers">

                            <tr>
                                <td>Name Registration Certificate NPC Front</td>
                                <td><img src="{{ getImage($applicant->name_registration_of_npc_front) }}" height="350px" />
                                </td>
                            </tr>
                            <tr>
                                <td>Name Registration Certificate NPC Back </td>
                                <td><img src="{{ getImage($applicant->name_registration_of_npc_back) }}" height="350px" />
                                </td>
                            </tr>


                        </table>

                        <div class="card-header">
                            <h5>Master Documents</h5>
                        </div>

                        <table id="customers">

                            <tr>
                                <td>Master Transcript Front</td>
                                <td><img src="{{ getImage($applicant->master_in_pharmacy_transcript_front) }}"
                                        height="350px" /></td>
                            </tr>
                            <tr>
                                <td>Master Transcript Back </td>
                                <td><img src="{{ getImage($applicant->master_in_pharmacy_transcript_back) }}"
                                        height="350px" /></td>
                            </tr>
                            <tr>
                                <td>Experience Details </td>
                                <td><img src="{{ getImage($applicant->experience_details) }}" height="350px" /></td>
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
