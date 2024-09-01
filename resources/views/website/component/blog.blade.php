
<div class="blog-area {{ isset($from) ? 'bg-gray' : 'white' }} default-padding bottom-less">
    @if (isset($from) && $from === 'home')
        <div class="container">
            <div class="heading-left">
            <div class="row">
                <div class="col-lg-5">
                <h5>{{ $heading_blog->title }}</h5>
                <h2>{{ $heading_blog->excerpt }}</h2>
                </div>
                <div class="col-lg-6 offset-lg-1">
                <p>
                    {!!  $heading_blog->content !!}
                </p>
                <a class="btn btn-md btn-dark border" href="{{ url('blog') }}"
                    >View All <i class="fas fa-plus"></i
                ></a>
                </div>
            </div>
            </div>
        </div>
    @endif
    
    <div class="container">
        <div class="blog-items">
            <div class="row">
                <!-- Single Item -->
                @foreach ($blogs as $data)
                <div class="col-lg-4 col-md-6 single-item">
                    <div class="item">
                        <div class="thumb" style="height: 250px; width:100%;">
                            <a href="{{ url('single-blog/' .$data->id) }}"><img src="{{ $data->getImageUrlAttribute() }}" alt="Thumb" style="object-fit: cover;max-height: 250px;width: 100%; min-height:250px;"></a>
                            @php
                                    $createdAt = \Carbon\Carbon::parse($data->created_at);
                                    $day = $createdAt->format('d'); // Day
                                    $month = $createdAt->format('M'); // Short month name
                            @endphp
                            <div class="date">
                                <strong>{{ $day }} </strong> {{ $month }}
                            </div>
                        </div>
                        <div class="content">
                            <h4><a href="{{ url('single-blog/' .$data->id) }}">{{ truncateText($data->title, 25) }}</a></h4>
                            <p>
                                 {{ truncateText($data->excerpt, 70) }}
                            </p>
                        </div>
                        <div class="bottom-info">
                            <span><i class="fas fa-user"></i> Tajendra Bhandari</span>
                            <a class="btn-more" href="{{ url('single-blog/' .$data->id) }}">Read More <i class="arrow_right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
               
                <!-- End Single Item -->

                
                
            </div>

            @if (!isset($from))
                    <div style="padding: 10px; float:right;">
                        {{  $blogs->appends(request()->query())->links('admin.layout.pagination') }}
                    </div>
                 @endif
        </div>
    </div>

</div>