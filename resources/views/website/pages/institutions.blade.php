
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
                class="npc_sidebar_button active"
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
            </div>
          </div>

          <!-- content area section -->
          <div class="npc_content_area_wrapper">
            <div class="npc_content">
              <!-- Diploma section  -->
              <div id="npc_reg_diploma" class="npc_content_wrapper active">
                <div class="npc_reg_diploma_content">
                  <div class="npc_diploma_registered_college_table">
                    <table class="npc_table">
                      <thead>
                        <tr>
                          <th>S.N</th>
                          <th>College Name</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($diploma as $index => $data)
                        <tr>
                            <td>{{ ++ $loop->index }}</td>
                            <td>{{ $data->name }}</td>
                          </tr>
                        @endforeach
                        <!-- add rows -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- Bachelor section -->
              <div id="npc_reg_bachelor" class="npc_content_wrapper">
                <div class="npc_reg_bachelor_content">
                  <div class="npc_search_table_data">
                    <form class="npc_search_form" action="">
                      <input
                        class="npc_search_by_name"
                        type="search"
                        placeholder="Search by name"
                      />
                      <input
                        class="npc_search_based_on_provided_options"
                        type="search"
                        placeholder="Search by university"
                        list="npc_university_options"
                      />
                      <datalist id="npc_university_options">
                        <option value="Purbanchal"></option>
                        <option value="Tribhuvan"></option>
                        <option value="Kathmandu"></option>
                        <option value="Pokhara"></option>
                      </datalist>
                      <button class="npc_search_button" type="submit">
                        Search
                      </button>
                    </form>
                  </div>
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
                        <!-- add rows -->
                        <!-- <tr>
                        <td>1</td>
                        <td>ABC College of Engineering</td>
                      </tr> -->
                        <tr>
                          <td>1</td>
                          <td>XYZ Institute of Technology</td>
                          <td>Purbanchal</td>
                          <td>Purbanchal@gmail.com</td>
                          <td>01512612</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>PQR College of Arts</td>
                          <td>Purbanchal</td>
                          <td>purbanchal@gmail.com</td>
                          <td>0123654</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>LMN School of Business</td>
                          <td>Tribhuvan university</td>
                          <td>Tribhuvan@yahoo.com</td>
                          <td>0122552</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>LMN School of Business</td>
                          <td>Tribhuvan university</td>
                          <td>Tribhuvan@yahoo.com</td>
                          <td>0122552</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>LMN School of Business</td>
                          <td>Tribhuvan university</td>
                          <td>Tribhuvan@yahoo.com</td>
                          <td>0122552</td>
                        </tr>
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