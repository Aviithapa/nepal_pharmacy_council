@extends('admin.layout.app')

@section('content')

      @include('admin.component.form', ['model' => $facility, 'page' => 'facility','icon' => true])

@endsection