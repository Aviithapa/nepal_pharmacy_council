@extends('admin.layout.app')

@section('content')

   @include('admin.pages.user.form', ['model' => $user, 'roles' => $roles])

@endsection