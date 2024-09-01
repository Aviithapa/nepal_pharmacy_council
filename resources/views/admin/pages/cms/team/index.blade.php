@extends('admin.layout.app')

@section('content')

   <!-- start page title -->
        @include('admin.component.breadcrumb', ['title' => "Team Management"])
   <!-- end page title -->
   
   <!-- Search -->
        @include('admin.component.search', ['route' => "team.index"])
   <!-- End Search -->

   <!-- Body -->
        @include('admin.component.body', ['page' => "team", 'modal' => $teams, 'edit' => true, 'delete' => true,])
   <!-- End Body -->
@endsection