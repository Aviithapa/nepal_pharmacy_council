@extends('admin.layout.app')

@section('content')

<div class="row mt-5">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Edit Count</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('count.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        @foreach (getCountKeys() as $key => $type)
                            @php
                                $label = str_replace('_', ' ', ucfirst($key));
                            @endphp
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="validationCustom01">{{ $label }}</label>
                                    
                                        <input type="text" class="form-control" name="{{ $key }}" value="{{ getCount($key) }}">
                                   
                                    @if($errors->any())
                                        {{ $errors->first($key) }}
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="btn btn-primary mt-5" type="submit">Submit form</button>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<!-- end row -->

@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const textareas = document.querySelectorAll('.ckeditor');
            textareas.forEach(textarea => {
                ClassicEditor.create(textarea)
                    .catch(error => {
                        console.error(error);
                    });
            });
        });
    </script>
@endpush
