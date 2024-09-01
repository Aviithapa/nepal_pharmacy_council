<!-- header  -->
<header>
  <!-- TOP NAV -->
  <div class="npc__header-top-nav">
    <div class="npc__container--fluid px-2 flex justify-between">
      <!-- contact info  -->
      <div class="npc__header-contact flex">
        <div
          class="npc__header-contact-phone npc__contact-child flex items-center gap-1"
        >
          <span>
            <i class="fa-solid fa-phone"></i>
          </span>
          <span>{{ getSiteSetting('social_phone') }}  </span>
        </div>
        <div
          class="npc__header-contact-email npc__contact-child flex items-center gap-1"
        >
          <span>
            <i class="fa-solid fa-envelope"></i>
          </span>
          <span> {{ getSiteSetting('email') }}  </span>
        </div>
      </div>
      <!-- socail links  -->
      <div class="npc__header-social flex items-center">
        <a
        class="npc_social-link npc__header-social-child"
        href="{{ getSiteSetting('social_fb') }}"
        target="_blank"
        rel="noopener noreferrer"
      >
        <i class="fa-brands fa-square-facebook"></i>
      </a>
      |
      <span> {{ \Carbon\Carbon::now()->format('d M, Y') }} </span>
      </div>
    </div>
  </div>
  <!-- MIDDLE NAV  -->
  <div class="npc__header-middle-nav">
    <div class="npc__container--fluid">
      <!-- HEADER LOGO  -->
      <div class="npc__header-mid-wrapper">
        <div class="npc__header-logo">
          <a href="/">
            <div class="npc__logo-wrapper">
              <image
                src="{{ getSiteSetting('logo_image') }}"
                alt="nepal pharmacy council logo"
              />
            </div>
          </a>
        </div>

        <div class="npc__nepal-flag">
          <div class="npc__nepal-flag-wrapper">
            <img src="{{ asset('frontend/images/np_flag.gif') }}" alt="flag of nepal" />
          </div>
        </div>
        <!-- MOBILE NAV TOGGLE BUTTON -->
        <div class="npc__header-mob-toggle">
          <div class="npc__header-mob-toggle-icon-container">
            <button class="hamburger-icon" id="hamburger">
              <i class="fa-solid fa-bars"></i>
            </button>
            <button class="cross-icon" id="cross">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- MAIN NAV  -->
  <div class="npc__header-main-nav">
    <div class="npc__header-container px-2">
      <nav class="flex items-center">
        <!-- nav items  -->
        <!-- normal link  -->
        <div class="npc__nav-item">
          <a class="npc__nav-btn inline-block" href="/">home</a>
        </div>
        <!-- dropdown sample  -->
        <div class="npc__nav-item relative">
          <button
            class="npc__nav-btn npc__show-dropdown flex items-center transparent gap-1"
          >
            <span> about </span>
            <span class="npc__dropdown-icon">
              <i class="fa-solid fa-angle-down"></i>
            </span>
          </button>
          <div class="npc__dropdown invisible absolute left-0 top-full">
            <nav class="npc__dropdown-links flex flex-col">
              <a href="{{ url("about") }}" class="">Introduction</a>
              <a href="{{ url("bod") }}" class="">Board Member</a>
              <a href="{{ url("staff") }}" class="">Staffs</a>
            </nav>
          </div>
        </div>

        <div class="npc__nav-item relative">
          <button
            class="npc__nav-btn npc__show-dropdown flex items-center transparent gap-1"
          >
            <span> Institutions </span>
            <span class="npc__dropdown-icon">
              <i class="fa-solid fa-angle-down"></i>
            </span>
          </button>
          <div class="npc__dropdown invisible absolute left-0 top-full">
            <nav class="npc__dropdown-links flex flex-col">
              <a href="{{ url("institutions") }}" class="">Diploma Colleges</a>
              <a href="{{ url("bachelor") }}" class="">NPC Registered Bachelor Colleges</a>
            </nav>
          </div>
        </div>

        <div class="npc__nav-item relative">
          <button
            class="npc__nav-btn npc__show-dropdown flex items-center transparent gap-1"
          >
            <span> Minimum Requirement </span>
            <span class="npc__dropdown-icon">
              <i class="fa-solid fa-angle-down"></i>
            </span>
          </button>
          <div class="npc__dropdown invisible absolute left-0 top-full">
            <nav class="npc__dropdown-links flex flex-col">
              <a href="{{ url("requirement-diploma") }}" class="">Requirement For Diploma Level</a>
              <a href="{{ url("requirement-bachelor") }}" class="">Requirement For Bachelor Level</a>
            </nav>
          </div>
        </div>

        <div class="npc__nav-item relative">
          <button
            class="npc__nav-btn npc__show-dropdown flex items-center transparent gap-1"
          >
            <span> Act Regulation & Guidelines </span>
            <span class="npc__dropdown-icon">
              <i class="fa-solid fa-angle-down"></i>
            </span>
          </button>
          <div class="npc__dropdown invisible absolute left-0 top-full">
            <nav class="npc__dropdown-links flex flex-col">
              <a href="{{ url("act") }}" class="">Act</a>
              <a href="{{ url("regulation") }}" class="">Regulation</a>
              <a href="{{ url("guidelines") }}" class="">Guidelines</a>
            </nav>
          </div>
        </div>

        <div class="npc__nav-item">
          <a class="npc__nav-btn inline-block" href="{{ url('news') }}">News & Notice</a>
        </div>

        <div class="npc__nav-item relative">
          <button
            class="npc__nav-btn npc__show-dropdown flex items-center transparent gap-1"
          >
            <span> Syllabus & Publications </span>
            <span class="npc__dropdown-icon">
              <i class="fa-solid fa-angle-down"></i>
            </span>
          </button>
          <div class="npc__dropdown invisible absolute left-0 top-full">
            <nav class="npc__dropdown-links flex flex-col">
              <a href="{{ url("syllabus") }}" class="">Syllabus</a>
              <a href="{{ url("formation") }}" class="">Formation</a>
              <a href="{{ url("publication") }}" class="">Publications</a>
            </nav>
          </div>
        </div>

        <div class="npc__nav-item">
          <a class="npc__nav-btn inline-block" href="{{ url('cpd-activities') }}">CPD Activities</a>
        </div>

        <div class="npc__nav-item">
          <a class="npc__nav-btn inline-block" href="{{ url('gallary') }}">Gallery</a>
        </div>
      </nav>
    </div>
  </div>
  <!-- MOBILE NAV  -->
  <div class="npc__mob-nav" id="mobile-nav">
    <nav class="npc__mob-nav-links">

      <div class="npc__mob-nav-link">
        <a class="npc__mob-nav-item" href="/">home</a>
      </div>
      <!-- dropdown sample  -->

      <div
        class="npc__mob-nav-link npc__nav-link-dropdown npc__mob-dropdown-hide"
      >
        <button class="npc__mob-nav-item npc__mob-nav-drop-item">
          <span> about </span>
          <span class="npc__mob-drop-right-icon">
            <i class="fa-solid fa-angle-right"></i>
          </span>
          <span class="npc__mob-drop-down-icon">
            <i class="fa-solid fa-angle-down"></i>
          </span>
        </button>
        <div class="npc__mob-dropdown">
          <nav class="npc__mob-dropdown-links">
            <a href="/about" class="npc__mob-dropdown-item">About</a>
            <a href="/staff" class="npc__mob-dropdown-item">Staffs</a>
            <a href="/bod" class="npc__mob-dropdown-item"
              >Board Members</a
            >
          </nav>
        </div>
      </div>

      <div
      class="npc__mob-nav-link npc__nav-link-dropdown npc__mob-dropdown-hide"
    >
      <button class="npc__mob-nav-item npc__mob-nav-drop-item">
        <span> Institutions </span>
        <span class="npc__mob-drop-right-icon">
          <i class="fa-solid fa-angle-right"></i>
        </span>
        <span class="npc__mob-drop-down-icon">
          <i class="fa-solid fa-angle-down"></i>
        </span>
      </button>
      <div class="npc__mob-dropdown">
        <nav class="npc__mob-dropdown-links">
          <a href="/institutions" class="npc__mob-dropdown-item">Diploma Colleges</a>
          <a href="/bachelor" class="npc__mob-dropdown-item">NPC Registered Bachelor Colleges</a>
        </nav>
      </div>
    </div>

    <div
      class="npc__mob-nav-link npc__nav-link-dropdown npc__mob-dropdown-hide"
    >
      <button class="npc__mob-nav-item npc__mob-nav-drop-item">
        <span> Minimum Requirement </span>
        <span class="npc__mob-drop-right-icon">
          <i class="fa-solid fa-angle-right"></i>
        </span>
        <span class="npc__mob-drop-down-icon">
          <i class="fa-solid fa-angle-down"></i>
        </span>
      </button>
      <div class="npc__mob-dropdown">
        <nav class="npc__mob-dropdown-links">
          <a href="/requirement-diploma" class="npc__mob-dropdown-item">Diploma Level Requirement</a>
          <a href="/requirement-bachelor" class="npc__mob-dropdown-item">Bachelor Level Requirement</a>
        </nav>
      </div>
    </div>

    <div
    class="npc__mob-nav-link npc__nav-link-dropdown npc__mob-dropdown-hide"
  >
    <button class="npc__mob-nav-item npc__mob-nav-drop-item">
      <span> Act Regulation & Guidelines </span>
      <span class="npc__mob-drop-right-icon">
        <i class="fa-solid fa-angle-right"></i>
      </span>
      <span class="npc__mob-drop-down-icon">
        <i class="fa-solid fa-angle-down"></i>
      </span>
    </button>
    <div class="npc__mob-dropdown">
      <nav class="npc__mob-dropdown-links">
        <a href="/act" class="npc__mob-dropdown-item">Act</a>
        <a href="/regulation" class="npc__mob-dropdown-item">regulation</a>
        <a href="/guidelines" class="npc__mob-dropdown-item">guidelines</a>

      </nav>
    </div>
  </div>

    <div class="npc__mob-nav-link">
      <a class="npc__mob-nav-item" href="/news">News & Notice</a>
    </div>

    <div
    class="npc__mob-nav-link npc__nav-link-dropdown npc__mob-dropdown-hide"
  >
    <button class="npc__mob-nav-item npc__mob-nav-drop-item">
      <span> Syllabus & Publications </span>
      <span class="npc__mob-drop-right-icon">
        <i class="fa-solid fa-angle-right"></i>
      </span>
      <span class="npc__mob-drop-down-icon">
        <i class="fa-solid fa-angle-down"></i>
      </span>
    </button>
    <div class="npc__mob-dropdown">
      <nav class="npc__mob-dropdown-links">
        <a href="/syllabus" class="npc__mob-dropdown-item">syllabus</a>
        <a href="/formation" class="npc__mob-dropdown-item">formation</a>
        <a href="/publication" class="npc__mob-dropdown-item">publication</a>

      </nav>
    </div>
  </div>

  <div class="npc__mob-nav-link">
    <a class="npc__mob-nav-item" href="/cpd-activities">Cpd Activities</a>
  </div>

      <!-- drop down link  -->
      
      <!-- dorpdown 2  -->
    </nav>
  </div>
</header>


{{-- <header>
  <!-- TOP NAV -->
  <div class="npc__header-top-nav">
    <div class="npc__container--fluid px-2 flex justify-between">
      <!-- contact info  -->
      <div class="npc__header-contact flex">
        <div
          class="npc__header-contact-phone npc__contact-child flex items-center gap-1"
        >
          <span>
            <i class="fa-solid fa-phone"></i>
          </span>
          <span> {{ getSiteSetting('social_phone') }} </span>
        </div>
        <div
          class="npc__header-contact-email npc__contact-child flex items-center gap-1"
        >
          <span>
            <i class="fa-solid fa-envelope"></i>
          </span>
          <span> {{ getSiteSetting('email') }}  </span>
        </div>
      </div>
      <!-- socail links  -->
      <div class="npc__header-social flex items-center">
        <a
          class="npc_social-link npc__header-social-child"
          href="{{ getSiteSetting('social_fb') }}"
          target="_blank"
          rel="noopener noreferrer"
        >
          <i class="fa-brands fa-square-facebook"></i>
        </a>
        |
        <span> {{ \Carbon\Carbon::now()->format('d M, Y') }} </span>
      </div>
    </div>
  </div>
  <!-- MIDDLE NAV  -->
  <div class="npc__header-middle-nav">
    <div
      class="npc__container--fluid px-2 flex items-center justify-between"
    >
      <!-- HEADER LOGO  -->
      <div class="npc__header-mid-wrapper">
        <div class="npc__header-logo">
        <a href="/">
          <div class="npc__logo-wrapper">
            <image
              src="{{ getSiteSetting('logo_image') }}"
              alt="nepal pharmacy council logo"
            />
          </div>
        </a>
      </div>

      <div class="npc__nepal-flag">
        <div class="npc__nepal-flag-wrapper">
          <img src="{{ asset('frontend/images/np_flag.gif') }}" alt="flag of nepal" />
        </div>
      </div>
      <!-- MOBILE NAV TOGGLE BUTTON -->
      <div class="npc__header-mob-toggle">
        <div class="npc__header-mob-toggle-icon-container">
          <button class="hamburger-icon" id="hamburger">
            <i class="fa-solid fa-bars"></i>
          </button>
          <button class="cross-icon" id="cross">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- MAIN NAV  -->
  <div class="npc__header-main-nav">
    <div class="npc__header-container px-2">
      <nav class="flex items-center">
        <!-- nav items  -->
        <!-- normal link  -->
        <div class="npc__nav-item">
          <a class="npc__nav-btn inline-block" href="/">home</a>
        </div>
        <!-- dropdown sample  -->
        <div class="npc__nav-item relative">
          <button
            class="npc__nav-btn npc__show-dropdown flex items-center transparent gap-1"
          >
            <span> about </span>
            <span class="npc__dropdown-icon">
              <i class="fa-solid fa-angle-down"></i>
            </span>
          </button>
          <div class="npc__dropdown invisible absolute left-0 top-full">
            <nav class="npc__dropdown-links flex flex-col">
              <a href="{{ url("about") }}" class="">Introduction</a>
              <a href="{{ url("bod") }}" class="">Board Member</a>
              <a href="{{ url("staff") }}" class="">Staffs</a>
            </nav>
          </div>
        </div>

        <div class="npc__nav-item relative">
          <button
            class="npc__nav-btn npc__show-dropdown flex items-center transparent gap-1"
          >
            <span> Institutions </span>
            <span class="npc__dropdown-icon">
              <i class="fa-solid fa-angle-down"></i>
            </span>
          </button>
          <div class="npc__dropdown invisible absolute left-0 top-full">
            <nav class="npc__dropdown-links flex flex-col">
              <a href="{{ url("institutions") }}" class="">Diploma Colleges</a>
              <a href="{{ url("bachelor") }}" class="">NPC Registered Bachelor Colleges</a>
            </nav>
          </div>
        </div>

        <div class="npc__nav-item relative">
          <button
            class="npc__nav-btn npc__show-dropdown flex items-center transparent gap-1"
          >
            <span> Minimum Requirement </span>
            <span class="npc__dropdown-icon">
              <i class="fa-solid fa-angle-down"></i>
            </span>
          </button>
          <div class="npc__dropdown invisible absolute left-0 top-full">
            <nav class="npc__dropdown-links flex flex-col">
              <a href="{{ url("requirement-diploma") }}" class="">Requirement For Diploma Level</a>
              <a href="{{ url("requirement-bachelor") }}" class="">Requirement For Bachelor Level</a>
            </nav>
          </div>
        </div>

        <div class="npc__nav-item relative">
          <button
            class="npc__nav-btn npc__show-dropdown flex items-center transparent gap-1"
          >
            <span> Act Regulation & Guidelines </span>
            <span class="npc__dropdown-icon">
              <i class="fa-solid fa-angle-down"></i>
            </span>
          </button>
          <div class="npc__dropdown invisible absolute left-0 top-full">
            <nav class="npc__dropdown-links flex flex-col">
              <a href="{{ url("act") }}" class="">Act</a>
              <a href="{{ url("regulation") }}" class="">Regulation</a>
              <a href="{{ url("guidelines") }}" class="">Guidelines</a>
            </nav>
          </div>
        </div>

        <div class="npc__nav-item">
          <a class="npc__nav-btn inline-block" href="{{ url('news') }}">News & Notice</a>
        </div>

        <div class="npc__nav-item relative">
          <button
            class="npc__nav-btn npc__show-dropdown flex items-center transparent gap-1"
          >
            <span> Syllabus & Publications </span>
            <span class="npc__dropdown-icon">
              <i class="fa-solid fa-angle-down"></i>
            </span>
          </button>
          <div class="npc__dropdown invisible absolute left-0 top-full">
            <nav class="npc__dropdown-links flex flex-col">
              <a href="{{ url("syllabus") }}" class="">Syllabus</a>
              <a href="{{ url("formation") }}" class="">Formation</a>
              <a href="{{ url("publication") }}" class="">Publications</a>
            </nav>
          </div>
        </div>

        <div class="npc__nav-item">
          <a class="npc__nav-btn inline-block" href="{{ url('cpd-activities') }}">CPD Activities</a>
        </div>

      </nav>
    </div>
  </div>
  <!-- MOBILE NAV  -->
  <div class="hidden">
    <nav>
      <h2>mobile nav</h2>
    </nav>
  </div>
</header> --}}