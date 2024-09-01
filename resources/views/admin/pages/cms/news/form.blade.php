@extends('admin.layout.app')

@section('content')



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
                                        News</h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                    @if(isset($model))
                                        <form method="POST" action="{{ route('news.update', ["news" => $model->id]) }}" enctype="multipart/form-data">
                                            @method('PUT')
                                    @else
                                        <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                                    @endif
                                    @csrf
                            
                                        <div class="row"> 
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Title</label>
                                                    <input type="text" class="form-control" placeholder="Title" name="title"  required value="{{ isset($model) ? $model->title :old('title') }}">
                                                        @if($errors->any())
                                                            {{ $errors->first('title') }}
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Type </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Type" name="type" value="News Management" disabled>
                                                        @if($errors->any())
                                                            {{ $errors->first('email') }}
                                                        @endif
                                                </div>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label> Excerpt </label>
                                                <textarea class="form-control"  placeholder="Enter the Description" rows="5" name="excerpt">{{ isset($model) ? $model->excerpt :old('excerpt') }}</textarea>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label> Content </label>
                                                <textarea class="form-control" id="content" placeholder="Enter the Description" rows="10" name="content">{{ isset($model) ? $model->content :old('content') }}</textarea>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="inputFile">Select Files:</label>
                                                <input
                                                type="file"
                                                name="files[]"
                                                id="inputFile"
                                                multiple
                                                class="form-control @error('files') is-invalid @enderror">
                                            </div>
                                            @if(isset($model->media))  
                                                @foreach ($model->media as $media)
                                                    
                                                    <div class="col-lg-3 col-md-3 col-sm-6" style="position: relative;">
                                                        @if ($media->mime_type === 'application/pdf')
                                                        
                                                        <embed src="{{ getImage($media->path) }}" width="100%" height="200"
                                                        type="application/pdf">
                                                        @else
                                                            <img src="{{ getImage($media->path) }}" style="height: 200px;" alt="{{ $model->title }}"/>
                                                        @endif
                                                        <a data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat"  data-attr="{{ route( 'media.destroy', ['media'=> $media->id]) }}" style="cursor: pointer;">  <i class="bi-trash" style="color: red;
                                                            border-radius: 50%;
                                                            padding: 3px;
                                                            background: white;
                                                            cursor: pointer;
                                                            position: absolute;
                                                            top: 5px;
                                                            right: 16px;"></i>
                                                            </a>
                                                    </div>
                                            @endforeach
                                            @endif
                                        </div>
                                            
                                        <button class="btn btn-primary mt-5" type="submit">Submit form</button>
                                    </form>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="mySmallModalLabel">Delete Modal</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure want to delete?
                                </div>
                                <div class="modal-footer">
                                    <form  action="#" method="POST" id="deleteForm">
                                        @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->



@endsection


@push('scripts')
     <script>
            ClassicEditor.create( document.querySelector( '#content' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
        <script> 
            const exampleModal = document.getElementById('exampleModal')
            exampleModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget
            const recipient = button.getAttribute('data-attr')
             document.getElementById('deleteForm').action = recipient; 
            })
       </script>
@endpush
