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
