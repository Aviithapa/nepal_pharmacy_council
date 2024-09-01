
@extends('website.layout.app')

@section('content')

<section>
    <div class="npc_upper">
      <div class="npc_page_wrapper">
        <div class="npc_page">
          <!-- sidebar section -->
          <div class="npc_sidebar_wrapper">
            <div class="npc_sidebar">
              <a
                href="{{ url('institutions') }}"
                class="npc_sidebar_button"
                data-target="npc_reg_diploma"
              >
                Diploma Colleges
              </a>
              <a
                href="{{ url('bachelor') }}"
                class="npc_sidebar_button"
                data-target="npc_reg_bachelor"
              >
              NPC Registered Bachelor Colleges
              </a>
              <a
                href="{{ url('foreign') }}"
                class="npc_sidebar_button active"
                data-target="npc_reg_bachelor"
              >
              Foreign Colleges
              </a>
            </div>
          </div>

          <!-- content area section -->
          <div class="npc_content_area_wrapper">
            <div class="npc_content">

              <!-- Bachelor section -->
              <div id="npc_reg_bachelor" class="npc_content_wrapper active">
                <div class="npc_reg_bachelor_content">
                  <div class="npc_bachelor_registered_college_table">
                    <table class="npc_table">
                      <thead>
                        <tr>
                          <th>S.N</th>
                          <th>College</th>
                          <th>university</th>
                          <th>email</th>
                          <th>phone</th>
                        </tr>
                      </thead>
                      <tbody>
                         
                        @foreach($bachelor as $index => $data)
                        <tr>
                            <td>{{ ++ $loop->index }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->university }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->contact_number }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
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