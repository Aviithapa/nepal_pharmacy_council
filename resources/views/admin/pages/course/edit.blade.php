@extends('admin.layout.app')

@section('content')

@include('admin.pages.course.form', ['course' =>  $course])

@endsection