@extends('admin.layout.app')

@section('content')


  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ getSiteSetting('site_title') }}</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Welcome!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">
                                        Blinking Buttons
                                    </h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($settings as $setting)
                                        <div class="col-xxl-3 col-md-3 col-sm-6">
                                            {{ $setting->name }}
                                            <input type="checkbox" class="form-check-input toggle-checkbox" data-id="{{ $setting->id }}" data-attribute="is_blinking" {{ $setting->is_blinking ? 'checked' : '' }}>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="header-title">
                                            Registered Count
                                        </h4>
                                        <p class="text-muted mb-0">
                                        </p>
                                    </div>
                                    <div class="card-body">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="validationCustom01">Total Number of Pharmacist</label>
                                                        <input type="text" class="form-control" id="totalPharmacists" placeholder="Total Number of Pharmacist" name="total_number_of_pharmacist"  required value="{{ getCount('total_number_of_pharmacist') }}">
                                                            @if($errors->any())
                                                                {{ $errors->first('total_number_of_pharmacist') }}
                                                            @endif
                                                    </div>
                                            </div>
                                            
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Total Registered Pharmacy Assistant</label>
                                                    <input type="text" class="form-control" id="totalPharmacyAssistants"  placeholder="Title" name="total_number_of_pharmacy_assistant"  required value="{{ getCount('total_number_of_pharmacy_assistant') }}">
                                                        @if($errors->any())
                                                            {{ $errors->first('total_number_of_pharmacy_assistant') }}
                                                        @endif
                                                </div>
                                            </div>
                                    </div>
                        </div>

                    </div> <!-- end col-->

                        <div class="col-xxl-9 col-sm-12">
                            <div class="card widget-flat text-white">
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="header-title">
                                                Quick Popup News
                                            </h4>
                                            <p class="text-muted mb-0">
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('quick.news') }}" enctype="multipart/form-data">
                                                @csrf
                            
                                                <div class="row">
                        
                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="validationCustom01">Title</label>
                                                            <input type="text" class="form-control" placeholder="Title" name="title"  required value="{{ old('title') }}">
                                                                @if($errors->any())
                                                                    {{ $errors->first('title') }}
                                                                @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label" for="inputFile">Select Files:</label>
                                                            <input
                                                            type="file"
                                                            name="files[]"
                                                            accept="image/*, application/pdf"
                                                            id="inputFile"
                                                            multiple
                                                            class="form-control @error('file') is-invalid @enderror"/>
                                                        </div>
                                                    </div>
                            
                                                </div>
                                                <button class="btn btn-primary" type="submit">Submit form</button>
                                            </form>
                            
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div>
                            </div>
                        </div> 
                    </div>


                    <div class="row">
                            <div class="col-xxl-6 col-sm-12">
                                <div class="card widget-flat text-white">
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="header-title">
                                                    Message From Registrar
                                                </h4>
                                                <p class="text-muted mb-0">
                                                </p>
                                            </div>
                                            <div class="card-body">
                                                <form method="POST" action="{{ route('update.message', ['post' => $registrar->id]) }}" enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="form-label" for="validationCustom01"> Message </label>
                                                            <textarea class="form-control" id="content" placeholder="Enter the Message" rows="10" name="content">{{ isset($registrar) ? $registrar->content : old('content') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary mt-2" type="submit">Submit form</button>
                                                </form>
                                
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div>
                                </div>
                            </div> 

                            <div class="col-xxl-6 col-sm-12">
                                <div class="card widget-flat text-white">
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="header-title">
                                                    Message From Chairman
                                                </h4>
                                                <p class="text-muted mb-0">
                                                </p>
                                            </div>
                                            <div class="card-body">
                                                <form method="POST" action="{{ route('update.message', ['post' => $chairman->id]) }}" enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="form-label" for="validationCustom01"> Message </label>
                                                            <textarea class="form-control" id="content" placeholder="Enter the Message" rows="10" name="content">{{ isset($chairman) ? $chairman->content : old('content') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary mt-2" type="submit">Submit form</button>
                                                </form>
                                
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div>
                                </div>
                            </div> 

                            <div class="col-xxl-12 col-sm-12">
                                <div class="card widget-flat text-white">
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="header-title">
                                                    Upload Result
                                                </h4>
                                                <p class="text-muted mb-0">
                                                </p>
                                            </div>
                                            <div class="card-body">
                                                <form method="POST" action="{{ route('upload.result') }}" enctype="multipart/form-data">
                                                    @csrf
                                
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                            <label class="form-label" for="exam">Exam:</label>
                                                            <input
                                                                type="text"
                                                                name="exam"
                                                                id="exam"
                                                                class="form-control @error('exam') is-invalid @enderror"
                                                                placeholder="Enter Exam"
                                                                required
                                                            />
                                                            @error('exam')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                            <label class="form-label" for="level">Level:</label>
                                                            <select
                                                                name="level"
                                                                id="level"
                                                                class="form-select @error('level') is-invalid @enderror"
                                                                required
                                                            >
                                                                <option value="" disabled selected>Select Level</option>
                                                                <option value="pharmacist">Pharmacist</option>
                                                                <option value="pharmacy assistant">Pharmacy Assistant</option>
                                                            </select>
                                                            @error('level')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                            
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group mb-3">
                                                                <label class="form-label" for="inputFile">Select File:</label>
                                                                <input
                                                                type="file"
                                                                name="file" id="inputFile"
                                                                multiple
                                                                class="form-control @error('file') is-invalid @enderror"/>
                                                            </div>
                                                        </div>
                                
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">Upload Result</button>
                                                </form>
                                
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div>
                                </div>
                            </div> 
                        </div>

                        
                        </div>

                        

@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to handle the blur event and send the AJAX request
        function sendData(fieldId, fieldName) {
            let value = $('#' + fieldId).val();
            
            $.ajax({
                url: 'https://nepalpharmacycouncil.org.np/cms/count', // Update this to the correct route
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for security
                    field: fieldName,
                    value: value
                },
                success: function(response) {
                    console.log('Field saved successfully:', response);
                },
                error: function(xhr) {
                    console.error('Error saving field:', xhr.responseText);
                }
            });
        }

        // Attach the blur event to the input fields
        $('#totalPharmacists').blur(function() {
            sendData('totalPharmacists', 'total_number_of_pharmacist');
        });

        $('#totalPharmacyAssistants').blur(function() {
            sendData('totalPharmacyAssistants', 'total_number_of_pharmacy_assistant');
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.toggle-checkbox').change(function() {
            var id = $(this).data('id');
            var checked = $(this).prop('checked');

            $.ajax({
                url: 'https://nepalpharmacycouncil.org.np/cms/setting',
                method: 'POST', // Use POST method
                data: {
                    _token: '{{ csrf_token() }}', // Include CSRF token for security
                    id: id,
                    checked: checked ? 1 : 0,
                },
                success: function(response) {
                    console.log(response); // Handle success response
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Handle error response
                }
            });
        });
    });
</script>
@endpush