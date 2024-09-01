
@extends('website.layout.app')

@section('content')

    <section>
        <div class="npc_syllabus_wrapper">
        <div class="npc_syllabus">
            <div class="npc_syllabus_card">
                @foreach ($syllabus as $da)
                    <div class="npc_syllabus_item">
                        <span class="npc_syllabus_item_title">{{ $da->title }}</span>
                        <a href="{{ $da->getImageUrlAttribute() }}" target="_blank" class="npc_syllabus_download_button">Download</a>
                    </div>
                @endforeach
            
            
            </div>
        </div>
        </div>
    </section>

    


@endsection