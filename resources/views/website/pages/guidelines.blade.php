
@extends('website.layout.app')

@section('content')

<section>
    <div class="npc_page_wrapper">
      <div class="npc_page">
        <!-- sidebar section -->
        <div class="npc_sidebar_wrapper">
          <div class="npc_sidebar">
            <a href="{{ url('act') }}" class="npc_sidebar_button" data-target="npc_act">
              Act
            </a>
            <a href="{{ url('regulation') }}" class="npc_sidebar_button" data-target="npc_regulation">
              Regulation
            </a>
            <a href="{{ url('guidelines') }}" class="npc_sidebar_button active" data-target="npc_guideline">
              Guidelines
            </a>
            <a href="{{ url('code-of-conduct') }}"
              class="npc_sidebar_button"
              data-target="npc_code_of_conduct"
            >
              Code of Conduct
            </a>
          </div>
        </div>

        <!-- content area section -->
        <div class="npc_content_area_wrapper">
          <div class="npc_content">
   
            <section>
              <div class="npc_syllabus_wrapper">
              <div class="npc_syllabus">
                  <div class="npc_syllabus_card">
                      @foreach ($guidelines as $da)
                          <div class="npc_syllabus_item">
                              <span class="npc_syllabus_item_title">{{ $da->title }}</span>
                              <a href="{{ $da->getImageUrlAttribute() }}" target="_blank" class="npc_syllabus_download_button">Download</a>
                          </div>
                      @endforeach
                  
                  </div>
              </div>
              </div>
            </section>

        
            <!-- guideline section -->

            {{-- <div id="npc_guideline" class="npc_content_wrapper active">
              <div class="npc_guideline_content">
                <div class="npc_pdf_container">
                    <embed
                    src="{{ $guidelines->getImageUrlAttribute() }}"
                    type="application/pdf"
                    width="100%"
                    height="842"
                  />
                </div>
                
              </div>
            </div> --}}

           
          </div>
        </div>
      </div>
    </div>
  </section>

    


@endsection