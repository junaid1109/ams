@extends('layouts.app')

@php
  $advisoryMenu = \App\Models\Menu::where('route_name', 'advisory.index')->first();
  $breadcrumbs = [
    ['label' => 'Home', 'url' => route('home')],
    ['label' => $advisoryMenu?->label ?? 'Advisory', 'url' => route('advisory.index')],
    ['label' => $advisory->title, 'url' => null]
  ];
@endphp

@section('title', $advisory->title . ' - ' . (isset($siteName) ? $siteName : 'AMS'))
@section('meta_description', $advisory->description)

@section('content')

<!-- Page Title Section -->
<section class="page-title light-background" style="padding-top: 100px; padding-bottom: 60px;">
  <div class="container">
    <h1>{{ $advisory->title }}</h1>
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
        @if($advisory->image)
        <img src="{{ asset('storage/' . $advisory->image) }}" class="img-fluid rounded mb-4" alt="{{ $advisory->title }}">
        @endif

        @if($advisory->image_secondary)
        <img src="{{ asset('storage/' . $advisory->image_secondary) }}" class="img-fluid rounded mb-4" alt="{{ $advisory->title }}">
        @endif

        <h3>{{ $advisory->title }}</h3>
        <div>{!! $advisory->description !!}</div>

        @if($advisory->details)
        <h4 class="mt-4">Project Details</h4>
        <p>{!! $advisory->details !!}</p>
        @endif
      </div>

      <div class="col-lg-4">
        <div class="portfolio-info">
          <h3>Project Information</h3>
          <ul>
            @if($advisory->client)
            <li><strong>Client:</strong> {{ $advisory->client }}</li>
            @endif
            @if($advisory->category)
            <li><strong>Category:</strong> {{ $advisory->category }}</li>
            @endif
            @if($advisory->project_date)
            <li><strong>Project Date:</strong> {{ $advisory->project_date->format('M d, Y') }}</li>
            @endif
            @if($advisory->project_url)
            <li><strong>Project URL:</strong> <a href="{{ $advisory->project_url }}" target="_blank">Visit Project</a></li>
            @endif
          </ul>
        </div>

        @if($relatedPortfolios->count() > 0)
        <div class="sidebar mt-4">
          <h4 class="sidebar-title">Related Projects</h4>
          <ul class="sidebar-list">
            @foreach($relatedPortfolios as $related)
            <li>
              <a href="{{ route('advisory.show', $related) }}">{{ $related->title }}</a>
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
