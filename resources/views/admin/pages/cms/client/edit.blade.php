@extends('admin.layout.app')

@section('content')

   @include('admin.pages.cms.client.form', ['model' => $client])

@endsection