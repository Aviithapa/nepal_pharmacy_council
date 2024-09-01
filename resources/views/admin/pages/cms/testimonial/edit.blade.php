@extends('admin.layout.app')

@section('content')

   @include('admin.component.form', ['model' => $testimonial, 'page' => 'testimonial'])

@endsection