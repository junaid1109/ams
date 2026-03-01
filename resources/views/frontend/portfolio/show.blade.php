@extends('layouts.app')

@php
  $portfolioMenu = \App\Models\Menu::where('route_name', 'portfolio.index')->first();
  $breadcrumbs = [
    ['label' => 'Home', 'url' => route('home')],
    ['label' => $portfolioMenu?->label ?? 'Portfolio', 'url' => route('portfolio.index')],
    ['label' => $service->title, 'url' => null]
  ];
@endphp

@section('title', $service->title . ' - ' . (isset($siteName) ? $siteName : 'AMS'))
@section('meta_description', $service->description)

@section('content')

<!-- Page Title Section -->
<section class="page-title light-background" style="padding-top: 100px; padding-bottom: 60px;">
  <div class="container">
    <h1>{{ $service->title }}</h1>
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

<!-- Portfolio Details -->
<section class="portfolio-details section">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-8">
        @if($service->image)
        <img src="{{ asset('storage/' . $service->image) }}" class="img-fluid rounded mb-4" alt="{{ $service->title }}">
        @endif

        <h3>{{ $service->title }}</h3>
        <div>{!! $service->description !!}</div>

        @if($service->details)
        <h4 class="mt-4">Project Details</h4>
        <p>{!! $service->details !!}</p>
        @endif
      </div>

      <div class="col-lg-4">
        <div class="portfolio-info">
          <h3>Project Information</h3>
          <ul>
            @if($service->client)
            <li><strong>Client:</strong> {{ $service->client }}</li>
            @endif
            @if($service->category)
            <li><strong>Category:</strong> {{ $service->category }}</li>
            @endif
          </ul>
        </div>

        @if($relatedServices->count() > 0)
        <div class="sidebar mt-4">
          <h4 class="sidebar-title">Related Projects</h4>
          <ul class="sidebar-list">
            @foreach($relatedServices as $related)
            <li>
              <a href="{{ route('portfolio.show', $related) }}">{{ $related->title }}</a>
            </li>
            @endforeach
          </ul>
        </div>
        @endif
      </div>
    </div>
  </div>
</section>

@endsection
