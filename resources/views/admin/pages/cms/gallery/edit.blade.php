@extends('admin.layout.app')

@section('content')

   @include('admin.pages.cms.gallery.form', ['model' => $gallery])

@endsection