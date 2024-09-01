@extends('admin.layout.app')

@section('content')

   @include('admin.component.form', ['model' => $team, 'page' => 'team', 'meta_link' => true])

@endsection