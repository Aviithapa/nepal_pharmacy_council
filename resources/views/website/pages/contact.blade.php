
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
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14759.747757876043!2d85.34483255250703!3d27.671067403145898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1724817468128!5m2!1sen!2snp"
          width="100%"
          height="auto"
          style="border: 0"
          allowfullscreen="true"
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
    </div>
  </div>
</section>
   

@endsection