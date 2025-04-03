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
                font-size: 12px;
                /* Adjust as needed for readability */
                color: #000;
                /* Ensures consistent color for text */
                line-height: 1.5;
                /* Makes text more legible in print */
            }

            /* Remove unnecessary elements for printing */
            .no-print {
                display: none;
            }

            /* Adjust page layout */
            @page {
                margin: 0;
                /* Set page margins for PDF */
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
                font-size: 12px;
                /* Adjust as needed for readability */
                color: #000;
                /* Ensures consistent color for text */
                line-height: 1.5;
                /* Makes text more legible in print */
            }

            /* Remove unnecessary elements for printing */
            .no-print {
                display: none;
            }

            /* Adjust page layout */
            @page {
                margin: 0;
                /* Set page margins for PDF */
            }

            .footer {
                position: fixed;
                bottom: 0;
                width: 90%;
            }
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
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
        @foreach ($images as $image)
            <div class="image-container">
                <img src="{{ storage_path('app/public/specialization/' . $userId . '/' . basename($image)) }}" alt="Image">
            </div>
        @endforeach
    </div>

</body>

</html>
