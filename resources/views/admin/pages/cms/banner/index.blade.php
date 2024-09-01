@extends('admin.layout.app')

@section('content')

        <!-- start page title -->
                @include('admin.component.breadcrumb', ['title' => "Banner Management"])
        <!-- end page title -->


        <!-- Body -->
        <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-3">
                                <h5 class="header-title mb-0" style="text-transform: capitalize;">Banner List</h5>
                            </div>
                            <div id="yearly-sales-collapse" class="collapse show row">
                                <!-- List -->
                                
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                        <div class="card">
                                                <div class="card-body p-3">
                                                        <form method="POST" action="{{ route('banner.store') }}" enctype="multipart/form-data">
                                                                <div>
                                                                        <div class="form-group mb-3">
                                                                                <label class="form-label" for="inputFile">Select Image:</label>
                                                                                <input
                                                                                type="file"
                                                                                name="file"
                                                                                accept="image/*"
                                                                                id="inputFile"
                                                                                class="form-control @error('file') is-invalid @enderror"/>
                                                                        </div>
                                                                        </div>
                                                                </div>
                                                                <button class="btn btn-primary" type="submit">Create Banner</button>
                                                        </form>
                                                </div>
                                        </div>
                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                                                <div class="row">
                                                        @foreach ($banner as $ba)
                                                                <div class="col-xl-4" style="position: relative; margin-top: 2px;">
                                                                        <a  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat"  data-attr="{{ route( 'banner.destroy', ['banner'=> $ba->id]) }}" style="cursor: pointer;">  <i class="bi-trash" style="color: red;
                                                                        border-radius: 50%;
                                                                        padding: 3px;
                                                                        background: white;
                                                                        cursor: pointer;
                                                                        position: absolute;
                                                                        top: 5px;
                                                                        right: 16px;"></i>
                                                                        </a>
                                                                        <img src="{{ $ba->getImageUrlAttribute() }}" alt="{{ $ba->title }}" style="object-fit: cover; width:100%; height: 200px;"/>
                                                                </div>
                                                        @endforeach
                                                        
                                                </div>
                                                <div style="padding: 10px; float:right;">
                                                        {{  $banner->appends(request()->query())->links('admin.layout.pagination') }}
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