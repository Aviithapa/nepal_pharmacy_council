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
                                         User</h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                       @if(isset($model))
                                             <form method="POST" action="{{ route('user.update', ["user" => $model->id]) }}">
                                                 @method('PUT')
                                        @else
                                            <form method="POST" action="{{ route('user.store') }}">
                                        @endif
                                        @csrf
                              
                                        <div class="row"> 
                                         
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Name</label>
                                                    <input type="text" class="form-control" placeholder="Name" name="username"  required value={{ isset($model) ? $model->username :old('name') }}>
                                                      @if($errors->any())
                                                         {{ $errors->first('name') }}
                                                      @endif
                                                </div>
                                            </div> 
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Email </label>
                                                    <input type="email" class="form-control" id="validationCustom01" placeholder="email" name="email"  required value={{ isset($model) ? $model->email : old('email') }}>
                                                     @if($errors->any())
                                                         {{ $errors->first('email') }}
                                                      @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Password </label>
                                                    <input type="password" class="form-control" id="validationCustom01" placeholder="password" name="password"  required value={{ isset($model) ? $model->password : old('password') }}>
                                                     @if($errors->any())
                                                         {{ $errors->first('password') }}
                                                      @endif
                                                </div>
                                            </div>
                                             <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Role</label>
                                                        <select class="form-select mb-3" name="role">
                                                           <option value={{ isset($model) ? $model->mainRole()->name : old('role') }}>{{ isset($model) ? $model->mainRole()->name : old('role') }}</option>
                                                            @foreach($roles as $role)
                                                                <option value={{ $role->name }}>{{ $role->name }}</option>
                                                            @endforeach
                                                        </select>
                                                      @if($errors->any())
                                                         {{ $errors->first('role') }}
                                                      @endif
                                                </div>
                                            </div> 
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Status</label>
                                                        <select class="form-select mb-3" name="status">
                                                            <option value={{ isset($model) ? $model->status : old('status') }}>{{ isset($model) ? $model->status : old('status') }}</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">In-Active</option>
                                                        </select>
                                                      @if($errors->any())
                                                         {{ $errors->first('status') }}
                                                      @endif
                                                </div>
                                            </div> 
                                             
                                             
                                             
                                            
                                             
                                        </div>
                                            
                                        <button class="btn btn-primary" type="submit">Submit form</button>
                                    </form>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->


@endsection