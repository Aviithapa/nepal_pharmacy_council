@extends('admin.layout.app')

@section('content')
<div class="row mt-5">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">
                    @if(isset($course))
                        Edit
                    @else
                        Create
                    @endif
                    Course
                </h4>
                <p class="text-muted mb-0">
                </p>
            </div>
            <div class="card-body">
                @if(isset($course))
                    <form method="POST" action="{{ route('course.update', ['course' => $course->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                @else
                    <form method="POST" action="{{ route('course.store') }}" enctype="multipart/form-data">
                @endif
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" class="form-control" placeholder="Title" name="title" required value="{{ isset($course) ? $course->title : old('title') }}">
                                @if($errors->any())
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="teacher_id">Teacher</label>
                                <select class="form-control select2" name="teacher_id" required>
                                    <option value="">Select Teacher</option>
                                    @foreach($advisors as $teacher)
                                        <option value="{{ $teacher->id }}"
                                            @if(isset($course) && $course->teacher_id == $teacher->id) selected @endif>
                                            {{ $teacher->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->any())
                                    <span class="text-danger">{{ $errors->first('teacher_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="teacher_image">Teacher Image</label>
                                <input type="file" class="form-control" name="teacher_image" accept="image/*">
                                @if($errors->any())
                                    <span class="text-danger">{{ $errors->first('teacher_image') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="category">Category</label>
                                <input type="text" class="form-control" placeholder="Category" name="category" required value="{{ isset($course) ? $course->category : old('category') }}">
                                @if($errors->any())
                                    <span class="text-danger">{{ $errors->first('category') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="price">Price</label>
                                <input type="number" step="0.01" class="form-control" placeholder="Price" name="price" required value="{{ isset($course) ? $course->price : old('price') }}">
                                @if($errors->any())
                                    <span class="text-danger">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="rating">Rating</label>
                                <input type="number" step="0.1" class="form-control" placeholder="Rating" name="rating" required value="{{ isset($course) ? $course->rating : old('rating') }}">
                                @if($errors->any())
                                    <span class="text-danger">{{ $errors->first('rating') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="num_ratings">Number of Ratings</label>
                                <input type="number" class="form-control" placeholder="Number of Ratings" name="num_ratings" required value="{{ isset($course) ? $course->num_ratings : old('num_ratings') }}">
                                @if($errors->any())
                                    <span class="text-danger">{{ $errors->first('num_ratings') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="lectures">Number of Lectures</label>
                                <input type="number" class="form-control" placeholder="Number of Lectures" name="lectures" required value="{{ isset($course) ? $course->lectures : old('lectures') }}">
                                @if($errors->any())
                                    <span class="text-danger">{{ $errors->first('lectures') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="duration">Duration (hours)</label>
                                <input type="number" step="0.1" class="form-control" placeholder="Duration" name="duration" required value="{{ isset($course) ? $course->duration : old('duration') }}">
                                @if($errors->any())
                                    <span class="text-danger">{{ $errors->first('duration') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="skill_level">Skill Level</label>
                                <input type="text" class="form-control" placeholder="Skill Level" name="skill_level" required value="{{ isset($course) ? $course->skill_level : old('skill_level') }}">
                                @if($errors->any())
                                    <span class="text-danger">{{ $errors->first('skill_level') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="language">Language</label>
                                <input type="text" class="form-control" placeholder="Language" name="language" required value="{{ isset($course) ? $course->language : old('language') }}">
                                @if($errors->any())
                                    <span class="text-danger">{{ $errors->first('language') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="students">Number of Students</label>
                                <input type="number" class="form-control" placeholder="Number of Students" name="students" required value="{{ isset($course) ? $course->students : old('students') }}">
                                @if($errors->any())
                                    <span class="text-danger">{{ $errors->first('students') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="advisors">Advisors</label>
                                <select class="form-control" multiple name="advisors[]">
                                    @foreach($advisors as $advisor)
                                        <option value="{{ $advisor->id }}"
                                            @if(isset($course) && $course->advisors->contains('id', $advisor->id)) selected @endif>
                                            {{ $advisor->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->any())
                                    <span class="text-danger">{{ $errors->first('advisors') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="description">Description</label>
                                <textarea class="form-control ckeditor" placeholder="Description" rows="5" name="description">{{ isset($course) ? $course->description : old('description') }}</textarea>
                                @if($errors->any())
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="learning_objectives">Learning Objectives</label>
                                <textarea class="form-control ckeditor" placeholder="Learning Objectives" rows="5" name="learning_objectives">{{ isset($course) ? $course->learning_objectives : old('learning_objectives') }}</textarea>
                                @if($errors->any())
                                    <span class="text-danger">{{ $errors->first('learning_objectives') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="curriculum">Curriculum</label>
                                <textarea class="form-control ckeditor" placeholder="Curriculum" rows="5" name="curriculum">{{ isset($course) ? $course->curriculum : old('curriculum') }}</textarea>
                                @if($errors->any())
                                    <span class="text-danger">{{ $errors->first('curriculum') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="image">Course Image</label>
                                <input type="file" class="form-control" name="file" accept="image/*">
                                @if($errors->any())
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                        </div>
                        @if(isset($course->image))
                            <div class="col-lg-3 col-md-3 col-sm-6" style="position: relative;"> 
                                <img src="{{ getImage($course->image) }}" style="height: 200px;"/>
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
