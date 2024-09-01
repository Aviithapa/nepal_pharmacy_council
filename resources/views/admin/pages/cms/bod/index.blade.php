@extends('admin.layout.app')

@section('content')

        <!-- start page title -->
                @include('admin.component.breadcrumb', ['title' => "Board Members"])
        <!-- end page title -->


        <!-- Body -->
        <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-3">
                                <h5 class="header-title mb-0" style="text-transform: capitalize;">Board Members List</h5>
                            </div>
                            <div id="yearly-sales-collapse" class="collapse show row">
                                <!-- List -->
                                
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                        <div class="card">
                                                <div class="card-body p-3">
                                                        <form method="POST" action="{{ route('bod.store') }}" enctype="multipart/form-data">
                                                                <div>
                                                                    <div class="col-lg-12 col-md-12 col-sm-12"> 
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="validationCustom01">BOD Name</label>
                                                                            <input type="text" class="form-control" placeholder="BOD Name" name="title"  required value="{{ isset($model) ? $model->title :old('title') }}">
                                                                                @if($errors->any())
                                                                                    {{ $errors->first('title') }}
                                                                                @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 col-md-12 col-sm-12"> 
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="validationCustom01">Position</label>
                                                                            <select class="form-select mb-3" name="excerpt" required>
                                                                                <option value="chairman">Chairman</option>
                                                                                <option value="registrar">Registrar</option>
                                                                                <option value="member">Member</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
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
                                                                <button class="btn btn-primary" type="submit">Create BOD</button>
                                                        </form>
                                                </div>
                                        </div>
                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                                                <div class="row">
                                                    @php
                                                        $sortedBanner = $banner->sort(function($a, $b) {
                                                            if ($a->excerpt === 'registrar') return -1;
                                                            if ($a->excerpt === 'chairman') return -1;
                                                            if ($b->excerpt === 'registrar' || $b->excerpt === 'chairman') return 1;
                                                            return 0;
                                                        });
                                                    @endphp
                                        
                                                @foreach ($sortedBanner as $ba)
                                                        <div class="col-xl-4" style="position: relative; margin-top: 2px; text-align:center;">
                                                            <a  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat"  data-attr="{{ route( 'bod.destroy', ['bod'=> $ba->id]) }}" style="cursor: pointer;">  <i class="bi-trash" style="color: red;
                                                                        border-radius: 50%;
                                                                        padding: 3px;
                                                                        background: white;
                                                                        cursor: pointer;
                                                                        position: absolute;
                                                                        top: 5px;
                                                                        right: 16px;"></i>
                                                                        </a>
                                                                        <img src="{{ $ba->getImageUrlAttribute() }}" alt="{{ $ba->title }}" style="object-fit: cover; width:100%; height: 200px;"/> <br />
                                                                        <h5>{{ $ba->title }}</h5>
                                                                        <h6>{{ $ba->excerpt }}</h6>

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