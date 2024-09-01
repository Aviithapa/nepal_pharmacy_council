
@extends('website.layout.app')

@section('content')
<section>
    <div class="npc__container--fluid px-2">
      <div class="npc__news-list-page">
        <div class="npc__header">
          <div class="npc__header-title">
            <h2>News</h2>
          </div>
        </div>
        <div class="npc__news-content">
            <div class="npc__news-content-wrapper">
              @foreach ($news as $new)
              <div class="npc__news-item flex gap-2 py-2">
                  <div class="npc__news-item-left">
                    <span class="inline-block">
                      <i class="fa-solid fa-newspaper"></i>
                    </span>
                  </div>
                  <div class="npc__news-item-right">
                    <h2>
                      <a href="{{ url('news-details/'.$new->id) }}" class="npc__news-item-title">
                        {{ $new->title }}
                      </a>
                    </h2>
                    <p>{{ \Carbon\Carbon::parse($new->created_at)->format('M d, Y')}}</p>
                  </div>
                </div>
                @endforeach

                
            </div>
            <div style="padding: 10px; float:right;">
                {{  $news->appends(request()->query())->links('admin.layout.pagination') }}
            </div>
          </div>
         
      
      </div>
    </div>
  </section>
    


@endsection