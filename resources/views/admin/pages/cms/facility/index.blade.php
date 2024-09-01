@extends('admin.layout.app')

@section('content')

            <!-- start page title -->
            @include('admin.component.breadcrumb', ['title' => "Post Management"])
            <!-- end page title -->
            
            <!-- Search -->
                    @include('admin.component.search', ['route' => "post.index"])
            <!-- End Search -->

            <!-- Body -->
                    @include('admin.component.body', ['page' => "facility", 'modal' => $facilities, 'edit' => true, 'delete' => false, 'id' => true])
            <!-- End Body -->
@endsection