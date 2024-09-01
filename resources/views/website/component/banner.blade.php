@isset($banners)
    

<div class="banner-area bg-gray transparent-nav default bottom-large">
    <div
      id="bootcarousel"
      class="carousel text-light slide carousel-fade animate_text"
      data-ride="carousel"
    >
      <!-- Indicators for slides -->
      <div class="carousel-indicator">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <ol class="carousel-indicators">
                <li
                  data-target="#bootcarousel"
                  data-slide-to="0"
                  class="active"
                ></li>
                <li data-target="#bootcarousel" data-slide-to="1"></li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      @foreach($banners as $index => $banner)
       <div class="carousel-inner carousel-zoom">
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">

     
              
                    <div
                      class="slider-thumb bg-cover"
                      style="background-image: url({{getImage($banner->image)}});"
                    ></div>
    
          
        
          
          <div class="box-table shadow dark">
            <div class="box-cell">
              <div class="container">
                <div class="row">
                  <div class="col-lg-9">
                    <div class="content">
                      <h2 data-animation="animated fadeInRight">
                        {!!  $banner->title  !!}
                      </h2>
                      <p data-animation="animated slideInLeft">{{ $banner->excerpt }}</p>
                      <a
                        data-animation="animated fadeInUp"
                        class="btn btn-md btn-gradient"
                        href="{{ url('/about') }}"
                        >Discover More</a
                      >
                      <a
                        data-animation="animated fadeInUp"
                        class="btn btn-md btn-light border"
                        href="{{ url('/course') }}"
                        >View Courses</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       
        @endforeach

      
      </div>
      <!-- End Wrapper for slides -->

      <!-- Left and right controls -->
      <a
        class="left carousel-control light"
        href="#bootcarousel"
        data-slide="prev"
      >
        <i class="ti-angle-left"></i>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="right carousel-control light"
        href="#bootcarousel"
        data-slide="next"
      >
        <i class="ti-angle-right"></i>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>

@endisset