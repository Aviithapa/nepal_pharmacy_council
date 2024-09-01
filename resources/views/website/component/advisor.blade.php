<div class="advisor-area carousel-shadow default-padding">
    <div class="container">
      <div class="heading-left">
        <div class="row">
          <div class="col-lg-5">
            <h5>{{ $heading_team->title }}</h5>
            <h2>{{ $heading_team->excerpt }}</h2>
          </div>
          <div class="col-lg-6 offset-lg-1">
            <p>
              {!!  $heading_team->content !!}
            </p>
            <a class="btn btn-md btn-dark border" href="{{ url('advisor-list') }}"
              >View All <i class="fas fa-plus"></i
            ></a>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="advisor-items text-center">
        <div class="advisor-carousel owl-carousel owl-theme">
          <!-- Single Item -->
          @foreach ($teams as $team)
          <div class="item">
            <div class="thumb">
              <img src="{{ $team->getImageUrlAttribute() }}" alt="Thumb" />
              {{-- <ul>
                <li class="facebook">
                  <a href="#">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
                <li class="twitter">
                  <a href="#">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
                <li class="linkedin">
                  <a href="#">
                    <i class="fab fa-linkedin-in"></i>
                  </a>
                </li>
              </ul> --}}
            </div>
            <div class="info">
              <h5><a href="{{ url('advisor/' . $team->id) }}">{{ $team->name }}</a></h5>
              <span>{{ $team->designation }}</span>
            </div>
          </div>
          @endforeach
          <!-- End Single Item -->
        </div>
      </div>
    </div>
  </div>