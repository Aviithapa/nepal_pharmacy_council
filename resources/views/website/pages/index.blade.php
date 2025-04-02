@extends('website.layout.app')

@section('content')

<div class="npc__notice-modal-container fixed" id="notice-modal">
  <div class="npc__notice-container" style="position: relative; padding: 20px;">
    <!-- Scrollable content container -->
    <div class="notice-container" id="notice-container" style="overflow-y: auto; max-height: 90vh;"></div>
    
    <!-- Close button -->
    <div class="npc__notice-close" id="close-notice">
      <span class="flex items-center justify-center" style="z-index: 1000">
        <i class="fa-solid fa-xmark"></i>
      </span>
    </div>
  </div>
</div>


<div class="background-overlay" id="overlay"></div>
<div class="reg-modal-container" id="reg-modal" data-visible="true">
  <div class="relative">
    <div
      class="reg-toggle-btn absolute left-0 flex items-center justify-center"
      id="reg-toggle"
    >
      <span id="slide-arrow-icon"> </span>
    </div>
    <div class="reg-content">
      <div class="reg-pa flex items-center justify-between gap-8">
        <span>Total registered pharmacist assistants</span>
        <span>{{ getCount('total_number_of_pharmacy_assistant') }}</span>
      </div>
      <div class="bar"></div>
      <div class="reg-p flex items-center justify-between gap-8">
        <span>Total registered pharmacist</span>
        <span>{{ getCount('total_number_of_pharmacist') }}</span>
      </div>
    </div>
  </div>
</div>

 <!-- announcement -->

 <section>
  <div class="npc__announcement-container--fluid flex">
    <div class="npc__announcement-title flex items-center justify-center">
      <h2 class="uppercase">News</h2>
    </div>
    <div
      class="announcement__marquee-container flex-1 overflow-hidden flex items-center"
    >
      <div class="announcement__marquee inline-block whitespace-nowrap">
        <p
          class="announcement__marquee-content cursor-pointer flex gap-4 items-center"
        >
          @foreach ($news as $new)
          <a href="{{ url('news-details/'.$new->id) }}" class="blinking-text">{{ $new->title}}</a>
        @endforeach
          
        </p>
      </div>
    </div>
  </div>
</section>

<!-- hero  -->

<section id="hero">
  <div class="npc__container--fluid">
    <div class="npc__hero-wrapper flex flex-col gap-4">
      <!-- quick links  -->
      <div class="npc__quick-links">
        <div
          class="npc__quick-links-wrapper flex flex-col justify-between"
        >
        <!-- NOc And Good Standing  -->
        {{-- NOC / Good Standing Letter / Specialization Update --}}

        <a
        href="/noc-online?heading=NOC / Good Standing Letter"
        target="_blank"
        rel="noopener noreferrer"
        style="height: 70px;"
        class="npc__quick-link {{ getBlinking('1') ? 'blinking-element' : '' }}  flex items-center justify-between"
      >
        <div class="npc__quick-link-title flex">
          <span>
            <i class="fa-solid fa-book" ></i>
          </span>
          <h2 class="" style="text-align: center;" >Apply For Noc <br /> Apply for Good Standing Letter </h2>
        </div>
        <span class="">
          <i class="fa-solid fa-bars"></i>
        </span>
      </a>

          <!-- know your professional  -->
          <a
            href="https://nepalpharmacycouncil.org.np/kyp/public/"
            target="_blank"
            rel="noopener noreferrer"
            style="height: 70px;"
            class="npc__quick-link {{ getBlinking('1') ? 'blinking-element' : '' }}  flex items-center justify-between"
          >
            <div class="npc__quick-link-title flex">
              <span>
                <i class="fa-solid fa-book"></i>
              </span>
              <h2 class="">Know Your Pharmacist (KYP)</h2>
            </div>
            <span class="">
              <i class="fa-solid fa-bars"></i>
            </span>
          </a>
          <!-- search professional  -->
          <a
            href="https://onlinenameregistration.nepalpharmacycouncil.org.np/old_records/search_professional"
            target="_blank"
            rel="noopener noreferrer"
            style="height: 70px;"
            class="npc__quick-link flex {{ getBlinking('3') ? 'blinking-element' : '' }}  items-center justify-between"
          >
            <div class="npc__quick-link-title flex">
              <span>
                <i class="fa-solid fa-magnifying-glass"></i>
              </span>
              <h2 class="">Search Professionals</h2>
            </div>
            <span class="">
              <i class="fa-solid fa-bars"></i>
            </span>
          </a>
          <!-- admit card  -->
          <a
            href="/noc-online?heading=Specialization Update"
            rel="noopener noreferrer"
            class="npc__quick-link flex {{ getBlinking('2') ? 'blinking-element' : '' }}  items-center justify-between"
          >
            <div class="npc__quick-link-title flex">
              <span>
                <i class="fa-solid fa-book"></i>
              </span>
              <h2 class="">Update Specialization <br /> (M. Pharma)</h2>
            </div>
            <span class="">
              <i class="fa-solid fa-bars"></i>
            </span>
          </a>
          <!-- result  -->
          <a
            href="https://onlinenameregistration.nepalpharmacycouncil.org.np/result"
            target="_blank"
            rel="noopener noreferrer"
            class="npc__quick-link flex {{ getBlinking('4') ? 'blinking-element' : '' }}  items-center justify-between"
          >
            <div class="npc__quick-link-title flex">
              <span>
                <i class="fa-solid fa-square-poll-vertical"></i>
              </span>
              <h2 class="">Result</h2>
            </div>
            <span class="">
              <i class="fa-solid fa-bars"></i>
            </span>
          </a>

          <a
            href="https://onlinenameregistration.nepalpharmacycouncil.org.np/admitcards"
            target="_blank"
            rel="noopener noreferrer"
            class="npc__quick-link flex {{ getBlinking('2') ? 'blinking-element' : '' }}  items-center justify-between"
          >
            <div class="npc__quick-link-title flex">
              <span>
                <i class="fa-solid fa-book"></i>
              </span>
              <h2 class="">Admit Card</h2>
            </div>
            <span class="">
              <i class="fa-solid fa-bars"></i>
            </span>
          </a>
        </div>
      </div>
      <!-- image slider  -->
      <div class="npc__image-slider">
        <div class="slider">
          <div class="slides">
            @foreach ($banners as $banner)
            <div class="slide-img">
              <img src="{{ $banner->getImageUrlAttribute() }}" alt="{{ $banner->title }}" />
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <!-- Members -->
      <div class="npc__members">
        <div class="npc__member-card-wrapper">
          <div class="npc__member-card flex flex-col items-center gap-1">
            <h2 class="npc__member-position">Chairman</h2>
            <div class="npc__member-dp">
              <img src="{{ $chairman->getImageUrlAttribute() }}" alt="chairman" />
            </div>
            <p class="npc__member-name">{{ $chairman->title }}</p>
          </div>
          <div class="npc__member-card flex flex-col items-center gap-1">
            <h2 class="npc__member-position">Registrar</h2>
            <div class="npc__member-dp">
              <img src="{{ $registrar->getImageUrlAttribute() }}" alt="sanjeev pandey" />
            </div>
            <p class="npc__member-name">{{ $registrar->title }}</p>
          </div>
          <div class="npc__card-decorator"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- news  -->
<section>
  <div class="npc__container--fluid">
    <div class="npc__news-wrapper flex gap-8">
      <div class="npc__news">
        <div class="npc__news-header flex">
          <div class="npc__news-heading">
            <button>News</button>
          </div>
        </div>
       
        <div class="npc__news-content">
          <div class="npc__news-content-wrapper">
            @foreach ($news as $index => $new)
            <div class="npc__news-item flex gap-2 py-2">
                <div class="npc__news-item-left">
                  <span class="inline-block">
                    <i class="fa-solid fa-newspaper"></i>
                  </span>
                </div>
                <div class="npc__news-item-right {{ $index=== 0 ? 'blinking-text' : ''}}" @if($index === 0)  style='color:red;' @endif>
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
          <div class="npc__read-more-wrapper">
            <a
              href="{{ url('news') }}"
              class="npc__read-more flex items-center justify-center gap-2"
            >
              <span>read more</span>
              <span class="npc__read-more-icon">
                <i class="fa-solid fa-angles-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="npc__facebook-iframe">
        <div class="npc__facebook-iframe-container">
          <iframe
            src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fnepalpharmacycouncil%2F&tabs=timeline&width=370&height=400&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=true&appId"
            width="100%"
            height="400"
            style="border: none; overflow: hidden"
            scrolling="no"
            frameborder="0"
            allowfullscreen="true"
            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
          ></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- about  -->

<section>
  <div class="npc__container--fluid">
    <div class="npc__about-container flex gap-8">
      <div class="npc__about-cover">
        <div class="npc__about-img">
          <img src="{{ $about->getImageUrlAttribute() }}" alt="about cover image" />
        </div>
      </div>
      <div class="npc__about-content">
        <h2 class="npc__about-title">About Us</h2>
        <div class="npc__about-description">
          <p>
            {!! $about->content !!}
          </p>
        </div>
        <a
          href="/about"
          class="npc__about-read-more mt-1 flex items-center justify-center gap-2"
        >
          <span>read more</span>
          <span class="npc__about-read-more-icon">
            <i class="fa-solid fa-angles-right"></i>
          </span>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- messages -->
<section>
  <div class="npc__messages-container--fluid px-2 mt-npc">
    <div class="npc__messages-container">
      <!-- message heading -->
      <div style="margin-bottom: 1rem" class="npc__messages-title">
        <h2>Messages</h2>
      </div>

      <div class="flex flex-col gap-10">
        {{-- <div class="npc__messages-first">
          <div class="npc__messages-first-container flex gap-8">
            <div class="npc__messages-cover order-2">
              <div class="npc__messages-cover-img">
                <img src="{{ $chairman->getImageUrlAttribute() }}" alt="sanjeev pandey" />
              </div>
              <div class="npc__message-author-info px-3 py-3">
                <h3 class="npc__message-author">{{ $chairman->title }}</h3>
                <h4 class="npc__message-author-position">Chairman</h4>
              </div>
            </div>
            <div class="npc__message-content">
              <div class="npc__message-wrapper">
                <p class="npc__message">
                  {{ $chairman->content }}
                </p>
              </div>
            </div>
          </div>
        </div> --}}

        <div class="npc__messages-second">
          <div class="npc__messages-second-container flex gap-8">
            <div class="npc__messages-cover">
              <div class="npc__messages-cover-img">
                <img src="{{ $registrar->getImageUrlAttribute() }}" alt="sanjeev pandey" />
              </div>
              <div class="npc__message-author-info px-3 py-3">
                <h3 class="npc__message-author">{{ $registrar->title }}</h3>
                <h4 class="npc__message-author-position">Registrar</h4>
              </div>
            </div>
            <div class="npc__message-content">
              <div class="npc__message-wrapper">
                <p class="npc__message">
                  {{ $registrar->content }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", () => {
  const noticeModal = document.getElementById("notice-modal");
  const closeNotice = document.getElementById("close-notice");
  const noticeContainer = document.getElementById("notice-container");

  const data = @json($mediaItems); // Your media items

  if (data.length === 0) {
    noticeModal.style.display = "none"; // Hide the modal if no data
    return;
  }

  // Function to populate notices
  function addNotices() {
    noticeContainer.innerHTML = ""; // Clear any existing content
    closeNotice.style.display = "block"
    data.forEach((item) => {
      if (item.type === "pdf") {
        const embed = document.createElement("embed");
        embed.src = item.file; // Path to the PDF file
        embed.type = "application/pdf";
        embed.width = "100%";
        embed.height = "842px";
        embed.style.marginBottom = "20px";

        noticeContainer.appendChild(embed);
      } else {
        const imgContainer = document.createElement("div");
        imgContainer.className = "npc__notice-img-container";
        imgContainer.style.marginBottom = "20px";

        const imgElement = document.createElement("img");
        imgElement.src = item.file;
        imgElement.alt = "";
        imgElement.style.width = "100%";
        imgElement.style.height = "auto";

        imgContainer.appendChild(imgElement);
        noticeContainer.appendChild(imgContainer);
      }
    });
  }

  addNotices(); // Populate notices on page load

  // Close modal on clicking close button
  closeNotice.addEventListener("click", () => {
    noticeModal.style.display = "none";
  });

  // Scrollable container for overflowing content
  noticeContainer.style.overflowY = "auto";
  noticeContainer.style.maxHeight = "90vh";
});


</script>
@endpush