@extends('website.layout.app')

@section('content')

<section>
    <div class="npc__container--fluid px-2">
      <div class="npc__news-detail-page">
        <div class="npc__news-detail">
          <div class="npc__news-title">
            <h2>{{ $news->title }}</h2>
            <p>{{ \Carbon\Carbon::parse($news->created_at)->format('M d, Y')}}</p>
          </div>
          @if ($news->image)
           <div class="">
            <img src="{{ $news->getImage() }}" alt="{{ $news->title }}"/>
           </div>
        
          @endif
          <div class="npc__news-detail-container">
            <div class="npc__news-preview">
              <div class="npc_pdf_container">
                @if (isset($news->media))
                    @foreach ($news->media as $media)
                       @if ($media->mime_type === 'application/pdf')
                        <embed
                        src="{{ getImage($media->path) }}"
                        type="{{ $media->mime_type }}"
                        width="100%"
                        height="800px"
                        />
                       @else
                       <div class="">
                        <img src="{{ getImage($media->path) }}" alt="{{ $news->title }}"/>
                       </div>
                       @endif
                        
                    @endforeach
                @endif
                
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



@endsection

@push('scripts')
 
@endpush