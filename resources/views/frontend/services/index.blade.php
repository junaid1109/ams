@extends('layouts.app')

@php
  $currentMenu = \App\Models\Menu::getCurrentPageMenu();
  $pageTitle = $currentMenu?->label ?? 'Services';
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

<!-- Portfolio Intro Section -->
@php
  $portfolioIntro = \App\Helpers\SettingHelper::get('portfolio_intro');
@endphp

<!-- Services Section -->
<section class=" section">
  <div class="container">
    <div class="row gy-4">
@if($portfolioIntro)

      <div class="intro-content text-center">
          {!! $portfolioIntro !!}
        </div>
@endif

      @foreach($services as $service)
      <div class="col-lg-4 col-md-6">
        <div class="service-item position-relative">
          @if($service->image)
          <div class="service-image">
            <img src="{{ asset('storage/' . $service->image) }}" class="img-fluid" alt="{{ $service->title }}">
          </div>
          @endif
          <h2><a href="{{ route('portfolio.show', $service->slug) }}" class="stretched-link">{{ $service->title }}</a></h2>
          <p>{{ $service->short_description }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@endsection
