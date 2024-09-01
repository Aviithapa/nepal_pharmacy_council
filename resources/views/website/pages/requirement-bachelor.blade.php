
@extends('website.layout.app')

@section('content')

<section>
    <div class="npc_page_wrapper">
      <div class="npc_page">
        <!-- sidebar section -->
        <div class="npc_sidebar_wrapper">
          <div class="npc_sidebar">
            <a href="{{ url('requirement-diploma') }}" 
              class="npc_sidebar_button"
              data-target="npc_min_diploma"
            >
              Diploma level Requirement
            </a>
            <a href="{{ url('requirement-bachelor') }}" class="npc_sidebar_button active" data-target="npc_min_bachelor">
              Bachelor level Requirement
            </a>
          </div>
        </div>

        <!-- content area section -->
        <div class="npc_content_area_wrapper">
          <div class="npc_content">

            <!-- Bachelor section -->
            <div id="npc_min_bachelor" class="npc_content_wrapper active">
              <div class="npc_min_bachelor_content">
                <div class="npc_pdf_container">
                  <embed
                    src="{{ $bachelor_req->getImageUrlAttribute() }}"
                    type="application/pdf"
                    width="100%"
                    height="842"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    


@endsection