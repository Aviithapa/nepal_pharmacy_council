@extends('admin.layout.app')

@section('content')

      @include('admin.component.form', ['model' => $blog, 'page' => 'blog'])

@endsection