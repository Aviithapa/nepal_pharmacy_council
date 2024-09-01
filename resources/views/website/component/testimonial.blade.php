<div class="testimonials-area carousel-shadow default-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    <h5>Testimonials</h5>
                    <h2>What People say about <br> Our quality.</h2>
                </div>
            </div>
        </div>
    </div>
   
    <div class="container">
        <div class="testimonial-items text-center">
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonials-carousel owl-carousel owl-theme owl-loaded owl-drag">
                      @foreach ( $testimonial as $data  )
                        <div class="item">
                          <div class="icon">
                            <i class="flaticon-quotation"></i>
                          </div>

                          <div class="content">
                            <p>
                              {!! $data->content !!} 
                            </p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                          </div>

                          <div class="provider">
                            <div class="thumb">
                                <img src="{{ $data->getImageUrlAttribute() }}" alt="Thumb">
                            </div>
                            <div class="info">
                                <h5>
                                  {{ $data->title }} 
                                </h5>
                                <span> {{ $data->excerpt }} </span>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>