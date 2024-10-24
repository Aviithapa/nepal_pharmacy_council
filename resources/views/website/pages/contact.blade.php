
@extends('website.layout.app')

@section('content')
  
<section>
  <div class="npc_page_wrapper">
    <div class="npc_contact">
      <div class="npc_contact_left">
        <h1>Nepal Pharmacy Council (NPC)</h1>
        <p>{{ getSiteSetting('location') }}</p>
        <p>Phone: <a href="tel:{{ getSiteSetting('social_phone') }}">{{ getSiteSetting('social_phone') }}</a></p>
        <p>
          Website:
          <a href="https://www.nepalpharmacycouncil.org.np/" target="_blank"
            >www.nepalpharmacycouncil.org.np</a
          >
        </p>
        <p>
          Email:
            {{ getSiteSetting('email') }}
        </p>
      </div>
      <div class="npc_contact_right">
        <iframe src="{{ getSiteSetting('social_google') }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
      </div>
    </div>
  </div>
</section>
   

@endsection