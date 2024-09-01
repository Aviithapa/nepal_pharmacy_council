
@extends('website.layout.app')

@section('content')

<section>
    <div class="npc_cpd_content_wrapper">
      <div class="npc_cpd_cards">
        @foreach ($cpd as $ca)
        <a href="{{  $ca->getImageUrlAttribute() }}" target="_blank">
        <div class="npc_cpd_card" data-pdf="{{  $ca->getImageUrlAttribute() }}">
            <embed src="{{  $ca->getImageUrlAttribute() }}" alt="CPD Activity 1" height="200"/>
            <h3><span>{{  $ca->title }}</span><span>{{  \Carbon\Carbon::parse($ca->created_at)->format('M d, Y') }}</span></h3>
          </div>
        </a>
        @endforeach
        
    </div>
  </section>
  <div class="npc_pdf_preview_overlay">
    <div class="npc_pdf_preview_container">
      <button class="npc_close_pdf_preview">&times;</button>
      <embed src="" type="application/pdf" width="100%" height="842" />
    </div>
  </div>

    


@endsection