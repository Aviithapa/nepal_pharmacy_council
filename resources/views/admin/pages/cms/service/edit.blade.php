@extends('admin.layout.app')

@section('content')

   @include('admin.pages.cms.service.form', ['model' => $service])

@endsection