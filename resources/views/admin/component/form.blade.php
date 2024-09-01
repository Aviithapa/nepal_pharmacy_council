<div class="row mt-5">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">
                    @if(isset($model))
                        Edit
                    @else
                        Create
                    @endif
                    {{ $page }}
                </h4>
                <p class="text-muted mb-0">
                </p>
            </div>
            <div class="card-body">
                @if(isset($model))
                    <form method="POST" action="{{ route($page. '.update', [$page => $model->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                @else
                    <form method="POST" action="{{ route($page.'.store') }}" enctype="multipart/form-data">
                @endif
                    @csrf

                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Title</label>
                                <input type="text" class="form-control" placeholder="Title" name="title"  required value="{{ isset($model) ? $model->title :old('title') }}">
                                    @if($errors->any())
                                        {{ $errors->first('name') }}
                                    @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Type </label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Type" name="type" value="{{ $page }} Management" disabled>
                                    @if($errors->any())
                                        {{ $errors->first('type') }}
                                    @endif
                            </div>
                        </div>

                        @if(isset($icon))
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Type </label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Icon" name="logo_image" value="{{ isset($model) ? $model->logo_image :old('logo_image') }}" >
                                    @if($errors->any())
                                        {{ $errors->first('logo_image') }}
                                    @endif
                            </div>
                        </div>
                        @endif

                        @if(isset($meta_link))
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="validationCustom01">Type</label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Icon" name="meta_link" value="{{ isset($model) ? $model->meta_link :old('meta_link') }}" >
                                    @if($errors->any())
                                        {{ $errors->first(' meta_link') }}
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="form-group mb-3">
                            <label> Excerpt </label>
                            <textarea class="form-control"  placeholder="Enter the Description" rows="5" name="excerpt">{{ isset($model) ? $model->excerpt :old('excerpt') }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label> Content </label>
                            <textarea class="form-control" id="content" placeholder="Enter the Description" rows="10" name="content">{{ isset($model) ? $model->content :old('content') }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="inputFile">Select Image:</label>
                            <input
                            type="file"
                            name="file"
                            accept="image/*, application/pdf"
                            id="inputFile"
                            multiple
                            class="form-control @error('file') is-invalid @enderror"/>
                        </div>
                        @if(isset($model->image))
                            <div class="col-lg-3 col-md-3 col-sm-6" style="position: relative;"> 
                                <img src="{{ getImage($model->image) }}" style="height: 200px;"/>
                            </div>
                        @endif

                    </div>
                    <button class="btn btn-primary mt-5" type="submit">Submit form</button>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>

@push('scripts')
     <script>
            ClassicEditor.create( document.querySelector( '#content' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
@endpush
