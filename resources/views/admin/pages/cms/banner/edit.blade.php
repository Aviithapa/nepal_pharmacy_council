@extends('admin.layout.app')

@section('content')

   @include('admin.component.form', ['model' => $banner, 'page' => 'banner'])

@endsection