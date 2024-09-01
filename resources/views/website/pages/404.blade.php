
@extends('website.layout.app')

@section('content')
      <!-- Start 404 
    ============================================= -->
    <div class="error-page-area overflow-hidden default-padding">
        <div class="container">
            <div class="row align-center" style="width: 100%; display:flex; justify-content: center; align-items:center; align-content:center;">
                <div class="col-lg-6 thumb" style="width: 50%; float:left;">
                    <img src="https://img.freepik.com/free-vector/error-404-concept-illustration_114360-1811.jpg" alt="Thumb">
                </div>
                <div class="col-lg-6">
                    <div class="error-box">
                        <h1>404</h1>
                        <h2>Sorry Page Was Not Found!</h2>
                        <a  href="{{ url('/') }}">Back to home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End 404 -->

@endsection