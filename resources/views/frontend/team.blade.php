@extends('layouts.app')

@php
  $currentMenu = \App\Models\Menu::getCurrentPageMenu();
  $pageTitle = $currentMenu?->label ?? 'Team';
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

<!-- Team Section -->
<section class="team section light-background">
  <div class="container">
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
