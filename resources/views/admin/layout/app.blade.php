<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel = "icon" class="img-fluid" href ="" type = "image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {{getSiteSetting('site_title') != null? getSiteSetting('site_title'): 'Nepal Pharmacy Council'}}  {{ isset($pageData->title)? '| '. $pageData->title:""}}
    </title>
    <link rel="shortcut icon" href="{{ getSiteSetting('logo_image')}}">
    @include('admin.layout.style')
    @stack('styles')
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>
    <div class="wrapper">
        @switch(Auth::user()->mainRole()->name)
            @case('super_admin')
                @include('admin.sidebar.super-admin')
            @break
            @case('admin')
                @include('admin.sidebar.sidebar')
            @break
            @case('noc_user')
                @include('admin.sidebar.noc')
            @break
            @default
                @include('admin.sidebar.default')
        @endswitch
       
          <div class="content-page">

                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                      
                         @yield('content')   
        
        
                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

            </div>
    </div>
@include('admin.layout.script')
@stack('scripts')
</body>
</html>
