@extends('layouts.app')

@php
  $currentMenu = \App\Models\Menu::getCurrentPageMenu();
  $pageTitle = $currentMenu?->label ?? 'About';
  $breadcrumbs = \App\Models\Menu::getBreadcrumbs();
@endphp

@section('title', (isset($siteName) ? $siteName : 'AMS') . ' - ' . $pageTitle)

@section('content')

<!-- Page Title Section -->
<section class="page-title light-background" style="padding-top: 100px; padding-bottom: 60px;">
  <div class="container">
    <h1>{{ $pageTitle }}</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        @foreach($breadcrumbs as $breadcrumb)
          @if($breadcrumb['url'])
          <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a></li>
          @else
          <li class="breadcrumb-item active">{{ $breadcrumb['label'] }}</li>
          @endif
        @endforeach
      </ol>
    </nav>
  </div>
</section>

<!-- About Section -->
<section class="about section">
  <div class="container">
    @if($page)
    <div class="row gy-4">
      @if($page->image)
      <div class="col-lg-6">
        <img src="{{ asset('storage/' . $page->image) }}" class="img-fluid rounded" alt="About Image">
      </div>
      @endif
      <div class="col-lg-6 content">
        <h2>{{ $page->title }}</h2>
        {!! $page->content !!}
      </div>
    </div>
    @endif
  </div>
</section>

@php
  // Helper function for home sections
  $getSection = function($name) use ($homeSections) {
    if ($homeSections) {
      return $homeSections->firstWhere('section_name', $name);
    }
    return null;
  };
  $aboutHomeSection = $getSection('about');
@endphp

@if($aboutHomeSection && $aboutHomeSection->content)
<!-- About Stats Section from Home Sections -->
<section class="about-stats section light-background">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>{{ $aboutHomeSection->title ?? 'About Us' }}</h2>
    </div>
    <div class="stats-row" style="display: flex; justify-content: center; gap: 40px; flex-wrap: wrap;">
      @php
        $stats = $aboutHomeSection->content ?? [];
        if (!is_array($stats)) {
          $stats = json_decode($stats, true) ?? [];
        }
      @endphp
       @foreach($stats as $stat)
              <div class="stat-item">
                  @php
                      $rawNumber = $stat['number'] ?? '0';
                      preg_match('/[\d.]+/', $rawNumber, $matches);
                      $numericValue = $matches[0] ?? 0;
                      $suffix = preg_replace('/[\d.]+/', '', $rawNumber);
                  @endphp
                  <div class="stat-number" style="font-size: 2rem; font-weight: bold; color: #313131;">
                      <span class="purecounter" 
                            data-purecounter-start="0" 
                            data-purecounter-end="{{ $numericValue }}" 
                            data-purecounter-duration="1">0</span>{{ $suffix }}
                  </div>
                  <div class="stat-label">{{ $stat['label'] ?? 'Statistic' }}</div>
              </div>
              @endforeach
    </div>
  </div>
</section>
@endif

@php $teamSection = $getSection('team');  @endphp
@if($teamSection?->is_active==1) 
<section id="team" class="team section">
  <div class="container section-title" data-aos="fade-up">
    <h2>{{ $teamSection?->title ?? 'Meet Our Team' }}</h2>
    <p>{{ $teamSection?->subtitle ?? 'Our Professional Team' }}</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-5">
      @foreach($teamMembers as $member)
      <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
        <div class="team-member">
          <div class="member-img">
            @if($member->image)
              <img src="{{ asset('storage/' . $member->image) }}" class="img-fluid" alt="{{ $member->name }}">
            @else
              @php
                $personPlaceholders = ['person-f-8.webp', 'person-m-12.webp', 'person-f-3.webp', 'person-m-7.webp', 'person-f-12.webp', 'person-m-8.webp', 'person-f-6.webp', 'person-m-12.webp'];
                $personPlaceholder = $personPlaceholders[$loop->index % count($personPlaceholders)];
              @endphp
              <img src="{{ asset('assets/img/person/' . $personPlaceholder) }}" class="img-fluid" alt="{{ $member->name }}">
            @endif
          </div>
          <div class="member-info">
            <h4>{{ $member->name }}</h4>
            <span>{{ $member->position }}</span>
            <p>{{ $member->bio }}</p>
            <div class="social">
              @if($member->twitter)<a href="{{ $member->twitter }}"><i class="bi bi-twitter-x"></i></a>@endif
              @if($member->linkedin)<a href="{{ $member->linkedin }}"><i class="bi bi-linkedin"></i></a>@endif
              @if($member->instagram)<a href="{{ $member->instagram }}"><i class="bi bi-instagram"></i></a>@endif
              @if($member->facebook)<a href="{{ $member->facebook }}"><i class="bi bi-facebook"></i></a>@endif
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

@endsection
