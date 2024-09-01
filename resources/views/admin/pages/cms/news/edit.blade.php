@extends('admin.layout.app')

@section('content')

   @include('admin.pages.cms.news.form', ['model' => $news])

@endsection