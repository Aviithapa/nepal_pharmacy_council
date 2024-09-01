
@extends('website.layout.app')

@section('content')
<section>
  <div class="npc_page_wrapper">
    <div class="npc_page">
      <!-- sidebar section -->
      <div class="npc_sidebar_wrapper">
        <div class="npc_sidebar">
          <a class="npc_sidebar_button active" href="{{ url('about') }}">
            About
          </a>
          <a class="npc_sidebar_button" href="{{ url('bod') }}">
            Board Member
          </a>
          <a class="npc_sidebar_button" href="{{ url('staff') }}">
            Staff
          </a>
        </div>
      </div>

      <!-- content area section -->
      <div class="npc_content_area_wrapper">
        <div class="npc_content">
          <div id="npc_about" class="npc_content_wrapper active">
            <div class="npc_about_content">
              <h2>Introduction</h2>
               {!! $about->content !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  
    


@endsection