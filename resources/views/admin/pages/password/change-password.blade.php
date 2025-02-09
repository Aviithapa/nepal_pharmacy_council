@extends('admin.layout.app')

@section('content')

        <!-- start page title -->
                @include('admin.component.breadcrumb', ['title' => "Change Password"])
        <!-- end page title -->


        <!-- Body -->
        <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-3">
                                <h5 class="header-title mb-0" style="text-transform: capitalize;">Change Password</h5>
                            </div>
                            <div id="yearly-sales-collapse" class="collapse show row">
                                <!-- List -->
                                
                                <div class="col-xl-12 col-lg-12 col-md-4 col-sm-12">
                                        <div class="card">
                                                <<div class="card-body">
                                                    @if(session('success'))
                                                        <div class="alert alert-success">{{ session('success') }}</div>
                                                    @endif
                            
                                                    <form method="POST" action="{{ route('password.update') }}">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label class="form-label">Current Password</label>
                                                            <input type="password" class="form-control" name="current_password" value="{{ old('current_password') }}" required>
                                                            @if($errors->has('current_password'))
                                                                <span class="text-danger">{{ $errors->first('current_password') }}</span>
                                                            @endif
                                                        </div>
                            
                                                        <div class="mb-3">
                                                            <label class="form-label">New Password</label>
                                                            <input type="password" class="form-control" name="new_password" value="{{ old('new_password') }}" required>
                                                            @if($errors->has('new_password'))
                                                                <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                                            @endif
                                                        </div>
                            
                                                        <div class="mb-3">
                                                            <label class="form-label">Confirm New Password</label>
                                                            <input type="password" class="form-control" name="confirm_password" value="{{ old('confirm_password') }}" required>
                                                            @if($errors->has('confirm_password'))
                                                                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                                            @endif
                                                        </div>
                            
                                                        <button class="btn btn-primary" type="submit">Change Password</button>
                                                    </form>
                                                </div>
                                        </div>
                                     
                                </div>


                               
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