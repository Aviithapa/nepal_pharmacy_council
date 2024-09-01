 <!-- Start Breadcrumb 
    ============================================= -->
    @if(isset($pageData) && $slug !== 'index')
    <div class="react-breadcrumbs">
      <div class="breadcrumbs-wrap">
          <img class="desktop" src="{{ asset('frontend/images/breadcrumb.jpg') }}" alt="Breadcrumbs">
          <div class="breadcrumbs-inner">
              <div class="container">
                  {{-- <div class="breadcrumbs-text">
                      <h1 class="breadcrumbs-title">{{ $pageData->title }}</h1>
                      <div class="back-nav">
                          <ul>
                              <li><a href="/">Home</a></li>
                               
                          </ul>
                      </div>
                  </div> --}}
              </div>
          </div>
      </div>                
  </div>
  @endif
    <!-- End Breadcrumb -->


     