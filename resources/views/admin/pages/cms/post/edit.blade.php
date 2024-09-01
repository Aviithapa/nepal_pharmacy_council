@extends('admin.layout.app')

@section('content')

      @include('admin.component.form', ['model' => $post, 'page' => 'post'])

@endsection