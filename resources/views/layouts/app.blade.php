<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', (isset($siteName) ? $siteName : config('app.name', 'AMS')) . ' - Professional Business')</title>
  <meta name="description" content="@yield('meta_description', 'Professional Business')">
  <meta name="keywords" content="@yield('meta_keywords', '')">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  @stack('css')
</head>

<body>

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{ route('home') }}" class="logo d-flex align-items-center">
        @php
          $logo = \App\Helpers\SettingHelper::get('site_logo');
        @endphp
        @if($logo)
        <img src="{{ asset('storage/' . $logo) }}" alt="{{ isset($siteName) ? $siteName : config('app.name', 'AMS') }}" style="max-height: 50px;">
        @else
        <h1 class="sitename">{{ isset($siteName) ? $siteName : config('app.name', 'AMS') }}</h1>
        @endif
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}" class="@if(Route::currentRouteName() == 'home') active @endif">Home</a></li>
          <li><a href="{{ route('about') }}" class="@if(Route::currentRouteName() == 'about') active @endif">About</a></li>
          <li><a href="{{ route('services.index') }}" class="@if(str_contains(Route::currentRouteName(), 'services')) active @endif">Services</a></li>
          <li><a href="{{ route('portfolio.index') }}" class="@if(str_contains(Route::currentRouteName(), 'portfolio')) active @endif">Portfolio</a></li>
          <li><a href="{{ route('team') }}" class="@if(Route::currentRouteName() == 'team') active @endif">Team</a></li>
          <li><a href="{{ route('contact.index') }}" class="@if(Route::currentRouteName() == 'contact.index') active @endif">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">
    @yield('content')
  </main>

  <footer id="footer" class="footer light-background">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="" class="logo d-flex align-items-center">
            <span>{{ isset($siteName) ? $siteName : config('app.name', 'AMS') }}</span>
          </a>
          <p>{{ \App\Helpers\SettingHelper::get('footer_description', 'Your company description goes here. This is a professional business template.') }}</p>
          <div class="social-links d-flex mt-4">
            <a href="#"><i class="bi bi-twitter-x"></i></a>
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About us</a></li>
            <li><a href="{{ route('services.index') }}">Services</a></li>
            @forelse(\App\Models\Page::where('published', 1)->orderBy('title')->get() as $page)
            <li><a href="{{ route('page.show', $page) }}">{{ $page->title }}</a></li>
            @empty
            @endforelse
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            @forelse(\App\Models\Service::where('published', 1)->orderBy('order')->limit(4)->get() as $service)
            <li><a href="{{ route('services.show', $service->id) }}">{{ $service->title }}</a></li>
            @empty
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            @endforelse
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-lg-left">
          <h4>Contact Us</h4>
          <p>
            <strong>Address:</strong> {{ \App\Helpers\SettingHelper::get('site_address', 'A108 Adam Street, New York, NY 535022') }}<br>
            <strong>Phone:</strong> {{ \App\Helpers\SettingHelper::get('site_phone', '+1 5589 55488 55') }}<br>
            <strong>Email:</strong> {{ \App\Helpers\SettingHelper::get('site_email', 'info@ams.com') }}<br>
          </p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>{{ date('Y') }}</span> <strong class="px-1">{{ isset($siteName) ? $siteName : config('app.name', 'AMS') }}</strong> <span>All Rights Reserved</span></p>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  @stack('js')

</body>

</html>
