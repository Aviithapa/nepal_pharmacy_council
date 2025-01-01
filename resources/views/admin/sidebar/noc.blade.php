<div class="navbar-custom">
    <div class="topbar container-fluid">
        <div class="d-flex align-items-center gap-1">

            <!-- Topbar Brand Logo -->
            <div class="logo-topbar">
                <!-- Logo light -->
                <a href="{{ url('dashboard') }}" class="logo-light">
                    <span class="logo-lg">
                        <img src="{{ getSiteSetting('logo_image')}}" alt="logo">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ getSiteSetting('logo_image')}}" alt="small logo">
                    </span>
                </a>
            </div>

        
        </div>

        <ul class="topbar-menu d-flex align-items-center gap-3">
            <a href="{{ route('logout') }}" class="dropdown-item">
                <i class="bi bi-box-arrow-right fs-18 align-middle me-1"></i>
                <span>Logout</span>
            </a>
            <li class="dropdown d-lg-none">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <i class="bi bi-search fs-22"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                    <form class="p-3">
                        <input type="search" class="form-control" placeholder="Search ..." aria-label="Search">
                    </form>
                </div>
            </li>
        
            <li class="dropdown">
                <a class="nav-link dropdown-toggle arrow-none nav-user" data-bs-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <span class="account-user-avatar">
                        {{-- <img src="assets/images/users/avatar-1.jpg" alt="user-image" width="32" class="rounded-circle"> --}}
                    </span>
                    <span class="d-lg-block d-none">
                        <h5 class="my-0 fw-normal">{{ Auth::user()->name }}</h5>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>
        
        
                    <!-- item-->
                    <a href="{{ route('logout') }}" class="dropdown-item">
                        <i class="bi bi-box-arrow-right fs-18 align-middle me-1"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
        
    </div>
</div>

<div class="leftside-menu">

    <!-- Brand Logo Dark -->
    <a href="{{ url('dashboard') }}" class="logo logo-dark" style="height: 120px; margin-top: -10px;">
        <span class="logo-lg">
            <img src="{{ getSiteSetting('logo_image')}}" alt="dark logo" style="height: 100%; width: 200px;">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('Innov8itcode/assets/img/logo.png') }}" alt="small logo">
        </span>
    </a>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar style="border-top: 1px solid;">
        <!--- Sidemenu -->
        <ul class="side-nav" style="margin-bottom: 100px;">

            {{-- <li class="side-nav-title">Main</li> --}}

          

            <li class="side-nav-item">
                <a href="{{ url('backend/noc') }}" class="side-nav-link">
                    <i class="bi-book"></i>
                    <span> Apply For NOC </span>
                </a>
            </li>

            
        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->