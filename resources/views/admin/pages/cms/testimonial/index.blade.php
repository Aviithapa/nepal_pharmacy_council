@extends('admin.layout.app')

@section('content')
<!-- start page title -->
@include('admin.component.breadcrumb', ['title' => "Testomonial Management"])
<!-- end page title -->

<!-- Search -->
@include('admin.component.search', ['route' => "testimonial.index"])
<!-- End Search -->

<!-- Body -->
@include('admin.component.body', ['page' => "testimonial", 'modal' => $testimonial, 'edit' => true, 'delete' => false, 'id' => true])
<!-- End Body -->

@endsection