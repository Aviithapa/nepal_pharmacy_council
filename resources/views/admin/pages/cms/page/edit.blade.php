@extends('admin.layout.app')

@section('content')

   @include('admin.pages.cms.page.form', ['model' => $page])

@endsection