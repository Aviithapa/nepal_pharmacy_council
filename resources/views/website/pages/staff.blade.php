
@extends('website.layout.app')

@section('content')
<section>
  <div class="npc_page_wrapper">
    <div class="npc_page">
      <!-- sidebar section -->
      <div class="npc_sidebar_wrapper">
        <div class="npc_sidebar">
          <a class="npc_sidebar_button" href="{{ url('about') }}">
            About
          </a>
          <a class="npc_sidebar_button" href="{{ url('bod') }}">
            Board Member
          </a>
          <a class="npc_sidebar_button active" href="{{ url('staff') }}">
            Staff
          </a>
        </div>
      </div>

      <!-- content area section -->
      <div class="npc_content_area_wrapper">
        <div class="npc_content">
        

          <div id="npc_board" class="npc_content_wrapper active">
            <div class="npc_board_content">
              <div class="npc_board_other_members">
                @foreach ($members as $staff)
                <div class="npc_board_member_card">
                    <div class="npc_image_container">
                      <img
                        src="{{ $staff->getImageUrlAttribute() }}"
                        alt="prajwol Jung Pandey"
                      />
                    </div>
                    <div class="npc_card_content">
                      <h3>{{ $staff->title }}</h3>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  
    


@endsection