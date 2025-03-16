<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title></title>
    <link href="https://fonts.cdnfonts.com/css/segoe-ui-4" rel="stylesheet">
    <style>

       
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
        <div class="ref_container" style="width: 100%; color: #0000ff; font-weight: 600; margin-bottom: 1rem; font-size: 16px; font-style: italic;">
            <p style="margin: 0; float: left; width: 50%; font-size: 16px;">Ref. No.: <span style="color:black !important;"> {{ $nocData->ref }}</span></p>
            <p style="margin: 0; float: right; width: 50%; text-align:right; font-size: 16px;">Date: <span style="color:black !important;"> {{ $currentDate }} </span></p>
        </div>
    </div>
    
          <!-- main content of noc-->
          <div
            style="
              padding: 0 3rem;
              margin-bottom: 5rem;
              background-image: url('{{ public_path('frontend/images/bg.png') }}');
              background-position: center center;
              background-repeat: no-repeat;
              z-index: -100;
              background-size: contain;
              background-blend-mode: multiply;
            "
          >
          <table style="width: 100%; height: 80px; font-weight: 600; margin-bottom: 1rem; border-collapse: collapse;">
            <tr>
              <!-- Image Cell -->
              <td style="width: 50%; height: 80px; text-align: left;">
                <p>
                  <span style="text-transform: capitalize;">
                    {{ $nocData->title }}
                  </span>
                    {{ $nocData->first_name . ' ' . $nocData->middle_name . ' ' . $nocData->last_name }}
                </p>
                <p>Citizenship No: {{ $nocData->citizenship }}</p>
                <p>
                  {{ $nocData->tole . ' ' . $nocData->ward . ' ' . $nocData->municipality . ' ' . $nocData->district }},
                  Nepal
                </p> 
              </td>
              <!-- Text Cell -->
              
            </tr>
          </table>
          
          
          
            <div
              class="subject_container"
              style="text-align: center; font-weight: 600; margin-bottom: 1rem; width:100%;"
            >
              <p style="font-size: 14px; text-decoration: underline">
                Subject: No Objection Letter
              </p>
            </div>
            <div class="noc_body" style="font-size: 14px; line-height: 30px;">
              <p style="margin-bottom: 1rem">
                Nepal Pharmacy Council (NPC) has no objection if you study and
                obtain <strong>Diploma in Pharmacy</strong> degree from the
                following academic institution with the conditions given below:
              </p>
              <div
                class="list_conditions"
                style="padding-left: 150px; margin-bottom: 1rem; line-height: 30px;"
              >
                <ul
                  style="
                    list-style-type: number;
                    display: flex;
                    flex-direction: column;
                    gap: 0.75rem;
                  "
                >
                  <li>
                    <p>
                      Institution must be approved by Pharmacy Council of
                      respective country.
                    </p>
                  </li>
                  <li>
                    <p>The internship will be the Liability of college.</p>
                  </li>
                  <li>
                    <p>
                      You must have done thesis work related subject of which an
                      abstract should be submitted to the council at the time of
                      registration.
                    </p>
                  </li>
                </ul>
              </div>
              <!-- university name-->
              <div class="university_info" style="font-weight: 600; line-height: 26px;">
                <p>Name of College/Institution:</p>
                <p style="width: 250px; ">
                    {{ $nocData->applied_college }}
                </p>
                <p>Afilated University/Board</p>
                <p>{{ $nocData->applied_university }}</p>
              </div>
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
             
              <div class="note" style="font-weight: 600">
                <h4>Note:-</h4>
                <ul style="list-style-type: number; padding-left: 2.5rem">
                  <li>
                    <p>
                      This NOC is issued based on the documents submitted by the
                      student and the approval of the institution by Pharmacy
                      Council of India. The authenticity of the academic
                      certificates of the respective student can be obtained
                      from the respective Board.
                    </p>
                  </li>
                  <li>
                    <p>
                      If the documents submitted are found to be fraudulent,
                      this NOC will be cancelled at any time.
                    </p>
                  </li>
                </ul>
              </div>
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
              Email: npc@nepalpharmacycouncil.org.np,
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
  </body>
</html>
