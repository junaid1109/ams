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
@section('meta_description', $service->short_description)

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

<!-- Service Details Section -->
<section class="service-details section">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-10">
        @if($service->image)
        <img src="{{ asset('storage/' . $service->image) }}" class="img-fluid rounded mb-4" alt="{{ $service->title }}">
        @endif

        <div>{!! $service->description !!}</div>

        @if($service->features)
        <h4 class="mt-4">Key Features</h4>
        <p>{!! $service->features !!}</p>
        @endif

        @if($service->pricing)
        <h4 class="mt-4">Pricing</h4>
        <p>{!! $service->pricing !!}</p>
        @endif
      </div>

     
    </div>
  </div>
</section>

@endsection
