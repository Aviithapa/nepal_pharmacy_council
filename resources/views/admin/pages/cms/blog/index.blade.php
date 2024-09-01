@extends('admin.layout.app')

@section('content')

            <!-- start page title -->
            @include('admin.component.breadcrumb', ['title' => "Blog Management"])
            <!-- end page title -->
            
            <!-- Search -->
                    @include('admin.component.search', ['route' => "blog.index"])
            <!-- End Search -->

            <!-- Body -->
                    @include('admin.component.body', ['page' => "blog", 'modal' => $blog, 'edit' => true, 'delete' => true])
            <!-- End Body -->
@endsection