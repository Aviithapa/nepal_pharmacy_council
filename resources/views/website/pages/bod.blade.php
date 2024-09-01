
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
          <a class="npc_sidebar_button active" href="{{ url('bod') }}">
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

          <div id="npc_board" class="npc_content_wrapper active">
            <div class="npc_board_content">
              <div class="npc_board_top_row">
                <div class="npc_board_member_card">
                  <div class="npc_image_container">
                    <img
                      src="{{ $chairman->getImageUrlAttribute() }}"
                      alt="{{ $chairman->title }}"
                    />
                  </div>
                  <div class="npc_card_content">
                    <h3>{{ $chairman->title }}</h3>
                    <p>Chairman</p>
                  </div>
                </div>
                <div class="npc_board_member_card">
                  <img
                    src="{{ $registrar->getImageUrlAttribute() }}"
                    alt="{{ $registrar->title }}"
                  />
                  <h3>{{ $registrar->title }}</h3>
                  <p>Registar</p>
                </div>
              </div>
              <div class="npc_board_other_members">
                @foreach ($members as $member)
                <div class="npc_board_member_card">
                    <div class="npc_image_container">
                      <img
                        src="{{ $member->getImageUrlAttribute() }}"
                        alt="{{ $member->title }}"
                      />
                    </div>
                    <div class="npc_card_content">
                      <h3>{{ $member->title }}</h3>
                      <p>Members</p>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          <!-- staff section -->
          <div id="npc_staff" class="npc_content_wrapper">
            <div class="npc_staff_content">
                @foreach ($members as $member)
                {{ $member }}
                <div class="npc_staff_member_card">
                    <div class="npc_image_container">
                      <img
                        src="{{ $member->getImageUrlAttribute() }}"
                        alt="{{ $member->title }}"
                      />
                    </div>
                    <div class="npc_card_content">
                      <h3>{{ $member->title }}</h3>
                      <p>Members</p>
                    </div>
                  </div>
                @endforeach
             

              <div class="npc_staff_member_card">
                <div class="npc_image_container">
                  <img
                    src="../assets/images/chairman.jpg"
                    alt="prajwol Jung Pandey"
                  />
                </div>
                <div class="npc_card_content">
                  <h3>prajwol Jung Pandey</h3>
                  <p>Chairman</p>
                </div>
              </div>

              <div class="npc_staff_member_card">
                <div class="npc_image_container">
                  <img
                    src="../assets/images/chairman.jpg"
                    alt="prajwol Jung Pandey"
                  />
                </div>
                <div class="npc_card_content">
                  <h3>prajwol Jung Pandey</h3>
                  <p>Chairman</p>
                </div>
              </div>

              <div class="npc_staff_member_card">
                <div class="npc_image_container">
                  <img
                    src="../assets/images/chairman.jpg"
                    alt="prajwol Jung Pandey"
                  />
                </div>
                <div class="npc_card_content">
                  <h3>prajwol Jung Pandey</h3>
                  <p>Chairman</p>
                </div>
              </div>

              <div class="npc_staff_member_card">
                <div class="npc_image_container">
                  <img
                    src="../assets/images/chairman.jpg"
                    alt="prajwol Jung Pandey"
                  />
                </div>
                <div class="npc_card_content">
                  <h3>prajwol Jung Pandey</h3>
                  <p>Chairman</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  
    


@endsection