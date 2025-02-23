<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images</title>
    <link href="https://fonts.cdnfonts.com/css/segoe-ui-4" rel="stylesheet">
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


    .footer {
          position: fixed;
          bottom: 0;
          width: 90%;
        }
      @media print {
        @font-face {
            font-family: "SegoeUI";
            src: url("../Segoe.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        body {
          font-family: "Segoe UI", Arial, sans-serif;
          font-size: 12px; /* Adjust as needed for readability */
          color: #000; /* Ensures consistent color for text */
          line-height: 1.5; /* Makes text more legible in print */
        }

        /* Remove unnecessary elements for printing */
        .no-print {
          display: none;
        }

        /* Adjust page layout */
        @page {
          margin: 0; /* Set page margins for PDF */
        }

        .footer {
          position: fixed;
          bottom: 0;
          width: 90%;
        }
      }
    

       
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: "Segoe UI", Arial, sans-serif;
        font-size: 12px;
        font-weight: 400;
        color: #000;
        line-height: 1.5;
      }

      
      .footer {
          position: fixed;
          bottom: 0;
          width: 90%;
        }
      @media print {
        @font-face {
            font-family: "SegoeUI";
            src: url("../Segoe.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        body {
          font-family: "Segoe UI", Arial, sans-serif;
          font-size: 12px; /* Adjust as needed for readability */
          color: #000; /* Ensures consistent color for text */
          line-height: 1.5; /* Makes text more legible in print */
        }

        /* Remove unnecessary elements for printing */
        .no-print {
          display: none;
        }

        /* Adjust page layout */
        @page {
          margin: 0; /* Set page margins for PDF */
        }

        .footer {
          position: fixed;
          bottom: 0;
          width: 90%;
        }
      }
      .page-break{
        page-break-after: always;
      }
    </style>
  </head>

  <body>
    <div
      class="header_section"
      style=" margin-bottom: 1rem"
    >
      <div class="logo_img" style="width: 100%; height: 9rem">
        <img
          style="width: 100%; height: 100%; object-fit: cover;"
          src="{{ public_path('frontend/images/npc_letter_head.png') }}"
          alt="npc_logo"
        />
      </div>
    </div>
    <section>
      <div
        class="container--fluid"
        style="width: 90%; max-width: 1440px; margin: 0 auto; border-top: 2px solid #0000ff;"
      >
      <div class="noc_content">
        <!-- Ref of noc -->
        <div class="ref_container" style="width: 100%; color: #0000ff; font-weight: 600; margin-bottom: 1rem;  font-style: italic;">
            <p style="margin: 0; float: left; width: 50%; font-size: 16px;">Ref. No.:   <span style="color:black !important;"> {{ $nocData->ref }}</span></p>
            <p style="margin: 0; float: right; width: 50%; text-align:right; font-size: 16px;">Date: <span style="color:black !important;">{{ $currentDate }}</span></p>
        </div>
    </div>
    
          <!-- main content of noc-->
          <div style="padding: 0 3rem;
              margin-top: 9rem;
              background-image: url('{{ public_path('frontend/images/bg.png') }}');
              background-position: center center;
              background-repeat: no-repeat;
              z-index: -100;
              background-size: contain;
              background-blend-mode: multiply;">
            <div
              class="subject_container"
              style="text-align: center; font-weight: 600; margin-bottom: 1rem; width:100%;"
            >
              <p style="font-size: 14px; text-decoration: underline">
                Subject: Letter of Good Standing
              </p>
            </div>
            <div class="noc_body" style="font-size: 14px; line-height: 30px;">
              <p style="margin-bottom: 1rem; text-align:justify;">
                This is to certify that   <span style="text-transform: capitalize;">
                    {{ $nocData->title }}
                  </span>
                  <span style="font-weight:700">{{ $nocData->first_name . ' ' . $nocData->middle_name . ' ' . $nocData->last_name }} 
                  </span>
                    a Nepalese national holding 
                 Passport no  <span style="font-weight:700">{{ $nocData->national_id }}</span> is registered with registration number  <span style="font-weight:700">{{ $nocData->registration_number }}</span> as a {{ $nocData->position }} in Nepal Pharmacy Council in accordance with
                 Nepal Pharmacy Council act, 2057 B.S.(2000 A.D).
                  <br /> <br />
                  {{ $nocData->title === 'mr' ? 'His' : 'Her' }} date of birth according to our record is {{ $dob }}. 
                 {{ $nocData->title === 'mr' ? 'He' : 'She' }} has passed  <span style="font-weight:700">{{ $nocData->level }}</span> from {{ $nocData->university }} 
                  in {{ $nocData->passed_year }}. {{ $nocData->title === 'mr' ? 'He' : 'She' }} is registered as a {{ $nocData->position }}. There is nothing against 
                  {{ $nocData->title === 'mr' ? 'him' : 'her' }} in Nepal Pharmacy Council till present day. <br /> <br /> I wish success in {{ $nocData->title === 'mr' ? 'his' : 'her' }} future career.
               
              </p>
              
              <!-- university name-->
             
              <table style="width: 100%; height: 80px; font-weight: 600; margin-bottom: 1rem; border-collapse: collapse;">
                <tr>
                  <!-- Image Cell -->
                  <td style="width: 50%;  text-align: left; vertical-align: middle;">
                    <!-- Replace this text with your desired content -->
                    <img src="{{ $qrCode }}" alt="QR Code">
    
                  </td>

                  <td style="width: 50%; height: 80px; text-align: center;">
                    <div style="display: inline-block; text-align: center;">
                      <img src="{{ public_path('frontend/images/signature.png') }}" height="120" width="120" style="object-fit: contain" />
                      <h4>{{ $nocData->registrar_name }}</h4>
                      <h4>Registrar</h4>
                  </div>
                  </td>
                  <!-- Text Cell -->
                  
                </tr>
              </table>
             
            
            </div>
          </div>
          <!-- noc footer -->
          <div
            class="footer"
            style="
              color: #0000ff;
              text-align: center;
              border-top: 2px solid #0000ff;
              padding-bottom: 2rem;
              bottom: 0;
            "
          >
            <p class="address_info">
              Prasuti Griha Marga, Babarmahal, Kathmandu-11, Nepal, Phone:
              +977-1-4790747
            </p>
            <p class="address_info">
              Email: npc@nepalpharmmacycouncil.org.np,
              registrar@nepalpharmacycouncil.org.np
            </p>
            <p>
              chairman@nepalpharmacycouncil.org.np,
              Website:www.nepalpharmacycouncil.org.np
            </p>
          </div>
        </div>
      </div>
    </section>
    <div class="page-break"></div>
    <div style="padding: 20px;">

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
    </div>

</body>
</html>
