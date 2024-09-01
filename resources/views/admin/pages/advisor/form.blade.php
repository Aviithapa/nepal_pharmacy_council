@extends('admin.layout.app')

@section('content')

<div class="row mt-5">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">
                    @if(isset($advisor))
                        Edit
                    @else
                        Create
                    @endif
                    Advisor
                </h4>
                <p class="text-muted mb-0">
                </p>
            </div>
            <div class="card-body">
                @if(isset($advisor))
                    <form method="POST" action="{{ route('advisor.update', ['advisor' => $advisor->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                @else
                    <form method="POST" action="{{ route('advisor.store') }}" enctype="multipart/form-data">
                @endif
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" class="form-control" placeholder="Name" name="name" required value="{{ isset($advisor) ? $advisor->name : old('name') }}">
                                @if($errors->any())
                                    {{ $errors->first('name') }}
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="designation">Designation</label>
                                <input type="text" class="form-control" placeholder="Designation" name="designation" required value="{{ isset($advisor) ? $advisor->designation : old('designation') }}">
                                @if($errors->any())
                                    {{ $errors->first('designation') }}
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="count_of_courses">Count of Course</label>
                                <input type="number" class="form-control" placeholder="Count of Course" name="count_of_courses" required value="{{ isset($advisor) ? $advisor->count_of_courses : old('count_of_courses') }}">
                                @if($errors->any())
                                    {{ $errors->first('count_of_courses') }}
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="rating">Rating</label>
                                <input type="number" step="0.1" class="form-control" placeholder="Rating" name="rating" required value="{{ isset($advisor) ? $advisor->rating : old('rating') }}">
                                @if($errors->any())
                                    {{ $errors->first('rating') }}
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="students_taught">Students Taught</label>
                                <input type="number" class="form-control" placeholder="Students Taught" name="students_taught" required value="{{ isset($advisor) ? $advisor->students_taught : old('students_taught') }}">
                                @if($errors->any())
                                    {{ $errors->first('students_taught') }}
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="contact_number">Contact Number</label>
                                <input type="text" class="form-control" placeholder="Contact Number" name="contact_number" required value="{{ isset($advisor) ? $advisor->contact_number : old('contact_number') }}">
                                @if($errors->any())
                                    {{ $errors->first('contact_number') }}
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" required value="{{ isset($advisor) ? $advisor->email : old('email') }}">
                                @if($errors->any())
                                    {{ $errors->first('email') }}
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="linkedin_url">LinkedIn URL</label>
                                <input type="url" class="form-control" placeholder="LinkedIn URL" name="linkedin_url" value="{{ isset($advisor) ? $advisor->linkedin_url : old('linkedin_url') }}">
                                @if($errors->any())
                                    {{ $errors->first('linkedin_url') }}
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="facebook_url">Facebook URL</label>
                                <input type="url" class="form-control" placeholder="Facebook URL" name="facebook_url" value="{{ isset($advisor) ? $advisor->facebook_url : old('facebook_url') }}">
                                @if($errors->any())
                                    {{ $errors->first('facebook_url') }}
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="twitter_url">Twitter URL</label>
                                <input type="url" class="form-control" placeholder="Twitter URL" name="twitter_url" value="{{ isset($advisor) ? $advisor->twitter_url : old('twitter_url') }}">
                                @if($errors->any())
                                    {{ $errors->first('twitter_url') }}
                                @endif
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="overview">Overview</label>
                            <textarea class="form-control ckeditor" placeholder="Overview" rows="5" name="overview">{{ isset($advisor) ? $advisor->overview : old('overview') }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="qualifications">Qualifications</label>
                            <textarea class="form-control ckeditor" placeholder="Qualifications" rows="5" name="qualifications">{{ isset($advisor) ? $advisor->qualifications : old('qualifications') }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="experience">Experience</label>
                            <textarea class="form-control ckeditor" placeholder="Experience" rows="5" name="experience">{{ isset($advisor) ? $advisor->experience : old('experience') }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="inputFile">Select Image:</label>
                            <input
                            type="file"
                            name="file"
                            accept="image/*"
                            id="inputFile"
                            class="form-control @error('file') is-invalid @enderror"/>
                        </div>
                        @if(isset($advisor->image))
                            <div class="col-lg-3 col-md-3 col-sm-6" style="position: relative;"> 
                                <img src="{{ getImage($advisor->image) }}" style="height: 200px;"/>
                            </div>
                        @endif

                    </div>
                    <button class="btn btn-primary mt-5" type="submit">Submit form</button>
                </form>
            </div>
        </div>
    </div>
</div>




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
