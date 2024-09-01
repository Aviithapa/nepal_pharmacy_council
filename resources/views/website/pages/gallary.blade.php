
@extends('website.layout.app')

@section('content')

<section>
    <div class="npc_cpd_content_wrapper">
        <div class="npc_cpd_cards">

           
            @foreach ($gallery as $galleries)
            @isset($galleries->media)
                @if ($galleries->media->count() > 0)
                    <h2 style="width: 100%;">{{ $galleries->title }}</h2><br />
                @endif
        
                @foreach ($galleries->media as $media)
                <div class="npc_cpd_card" data-pdf="../assets/pdfs/Act pdf.pdf">
                    <img src="{{ getImage($media->path) }}" alt="{{ $galleries->title }}" />
                    
                  </div>
                @endforeach
            @endisset
        @endforeach
        </div>
    </div>
</section>

@endsection