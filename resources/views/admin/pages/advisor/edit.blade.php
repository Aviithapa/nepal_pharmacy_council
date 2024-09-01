@extends('admin.layout.app')

@section('content')

@include('admin.pages.advisor.form', ['advisor' =>  $advisor])

@endsection