<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .image-container {
            margin-bottom: 20px;
        }
        .image-container img {
            width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

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
</head>
<body>

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
    @foreach($images as $image)
         <div class="image-container">
            <img src="{{ storage_path('app/public/noc/' . $userId . '/' . basename($image)) }}" alt="Image">
        </div>
    @endforeach

</body>
</html>
