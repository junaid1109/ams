@extends('layouts.app')

@section('title', (isset($siteName) ? $siteName : 'AMS') . ' - About Us')

@section('content')

<!-- Page Title Section -->
<section class="page-title light-background" style="padding-top: 100px; padding-bottom: 60px;">
  <div class="container">
    <h1>About Us</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">About</li>
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
      <div class="stat-item" style="text-align: center;">
        <div class="stat-number purecounter" style="font-size: 2.5rem; font-weight: bold; color: var(--accent-color);" data-purecounter-start="0" data-purecounter-end="{{ intval($stat['number'] ?? 0) }}" data-purecounter-duration="1">{{ $stat['number'] ?? 0 }}</div>
        <div class="stat-label" style="margin-top: 10px; color: var(--default-color);">{{ $stat['label'] ?? 'Statistic' }}</div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- Team Section -->
<section class="team section light-background">
  <div class="container">
    <div class="section-title">
      <h2>Our Team</h2>
      <p>Meet our professional team</p>
    </div>

    <div class="row gy-4">
      @foreach($teamMembers as $member)
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="team-member">
          @if($member->image)
          <div class="member-img">
            <img src="{{ asset('storage/' . $member->image) }}" class="img-fluid" alt="{{ $member->name }}">
          </div>
          @endif
          <div class="member-info">
            <h4>{{ $member->name }}</h4>
            <span>{{ $member->position }}</span>
            <p>{{ $member->bio }}</p>
            <div class="social">
              @if($member->twitter)<a href="{{ $member->twitter }}"><i class="bi bi-twitter-x"></i></a>@endif
              @if($member->facebook)<a href="{{ $member->facebook }}"><i class="bi bi-facebook"></i></a>@endif
              @if($member->instagram)<a href="{{ $member->instagram }}"><i class="bi bi-instagram"></i></a>@endif
              @if($member->linkedin)<a href="{{ $member->linkedin }}"><i class="bi bi-linkedin"></i></a>@endif
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@endsection
