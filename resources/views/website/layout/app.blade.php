<!DOCTYPE html>
<html lang="US">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
      {{getSiteSetting('site_title') != null? getSiteSetting('site_title'): 'Nepal Pharmacy Council'}}  {{ isset($pageData->title)? '| '. $pageData->title:""}}
    </title>
    <link rel="shortcut icon" href="{{ getSiteSetting('logo_image')}}">
    <meta name="keyword" content="`{{isset($pageData->meta_link)?$pageData->meta_link:getSiteSetting('meta_keyword')}}`">
    <meta name="description" content="`{{isset($pageData->meta_description)?$pageData->meta_description:getSiteSetting('meta_description')}}`">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('website.layout.style')
    @stack('styles')
</head>
<body>
    @include('website.layout.header')
    @include('website.layout.breadcrumb')


    <div class="contain" style="min-height: 600px;">
      @yield('content')
    </div>

    @include('website.layout.footer')
    @include('website.layout.script')

    @stack('scripts')
</body>
</html>
