@extends('admin.layout.app')

@section('content')

        <!-- start page title -->
                @include('admin.component.breadcrumb', ['title' => "Gallery Management"])
        <!-- end page title -->


        <!-- Body -->
        <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-3">
                                <h5 class="header-title mb-0" style="text-transform: capitalize;">Gallery List</h5>
                            </div>
                            <div id="yearly-sales-collapse" class="collapse show row">
                                <!-- List -->
                                
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                        <div class="card">
                                                <div class="card-body p-3">
                                                        <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
                                                                <div>
                                                                    <div class="col-lg-12 col-md-12 col-sm-12"> 
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="validationCustom01">Title</label>
                                                                            <input type="text" class="form-control" placeholder="Title" name="title"  required value="{{ isset($model) ? $model->title :old('title') }}">
                                                                                @if($errors->any())
                                                                                    {{ $errors->first('title') }}
                                                                                @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                                <label class="form-label" for="inputFile">Select Images:</label>
                                                                                <input
                                                                                type="file"
                                                                                name="files[]"
                                                                                accept="image/*"
                                                                                id="inputFile"
                                                                                multiple
                                                                                class="form-control @error('file') is-invalid @enderror"/>
                                                                        </div>
                                                                        </div>
                                                                </div>
                                                                <button class="btn btn-primary" type="submit">Create Image</button>
                                                        </form>
                                                </div>
                                        </div>
                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                                                <div class="row">
                                                    @foreach ($gallery as $galleries)
                                                    @isset($galleries->media)
                                                        @if ($galleries->media->count() > 0)
                                                            <h6>{{ $galleries->title }}</h6>
                                                        @endif
                                                
                                                        @foreach ($galleries->media as $media)
                                                            <div class="col-xl-4" style="position: relative; margin-top: 2px; text-align: center;">
                                                                <!-- Delete Button -->
                                                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat"
                                                                   data-attr="{{ route('gallery.destroy', ['gallery' => $media->id]) }}" style="cursor: pointer;">
                                                                    <i class="bi-trash" style="color: red; border-radius: 50%; padding: 3px; background: white;
                                                                    cursor: pointer; position: absolute; top: 5px; right: 16px;">
                                                                    </i>
                                                                </a>
                                                
                                                                <!-- Media Image -->
                                                                <img src="{{ getImage($media->path) }}" alt="{{ $media->title }}"
                                                                     style="object-fit: cover; object-position: center top; width: 100%; height: 200px;"/> <br />
                                                            </div>
                                                        @endforeach
                                                    @endisset
                                                @endforeach
                                                
                                                        
                                                </div>
                                                <div style="padding: 10px; float:right;">
                                                        {{  $gallery->appends(request()->query())->links('admin.layout.pagination') }}
                                                        </div>
                                        </div>
                                </div>


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

                                
                                <!-- List -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
        <!-- End Body -->

@endsection

@push('scripts')
<script> 
     const exampleModal = document.getElementById('exampleModal')
     exampleModal.addEventListener('show.bs.modal', event => {
     const button = event.relatedTarget
     const recipient = button.getAttribute('data-attr')
      document.getElementById('deleteForm').action = recipient; 
     })
</script>
    
@endpush