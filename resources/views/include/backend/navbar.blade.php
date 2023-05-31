<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo mt-4" href="index.html"><img src="{{ asset('backend/images/LogoJSP.jpg') }}" alt="logo" style="width: 13%"/>
        <h3 class="mt-1">Jaya Setya Plastik</h3>
    </a>
      <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('backend/images/LogoJSP.jpg') }}" alt="logo" style="width: 50%" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
      </button>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="nav-profile-img">
              <img src="{{ asset('backend/images/icon-profile.png') }}" alt="image">
              <span class="availability-status online"></span>
            </div>
            <div class="nav-profile-text">
              <p class="mb-1 text-black">{{ Auth::user()->name}}</p>
            </div>
          </a>
          <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
            <div class="dropdown-divider"></div>
            <form action="{{ route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="d-block"><i class="mdi mdi-logout me-2 text-primary"></i>  Logout</button>
            </form>
            {{-- <a class="dropdown-item" href="#">
              <i class="mdi mdi-logout me-2 text-primary"></i> Logout </a> --}}
          </div>
        </li>
        <li class="nav-item d-none d-lg-block full-screen-link">
          <a class="nav-link">
            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
          </a>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
