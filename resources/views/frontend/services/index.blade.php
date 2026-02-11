@extends('layouts.app')

@section('title', (isset($siteName) ? $siteName : 'AMS') . ' - Services')

@section('content')

<!-- Page Title Section -->
<section class="page-title light-background" style="padding-top: 100px; padding-bottom: 60px;">
  <div class="container">
    <h1>Services</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Services</li>
      </ol>
    </nav>
  </div>
</section>

<!-- Services Section -->
<section class="services section">
  <div class="container">
    <div class="row gy-4">
      @foreach($services as $service)
      <div class="col-lg-4 col-md-6">
        <div class="service-item position-relative">
          @if($service->icon)
          <div class="icon">
            <i class="{{ $service->icon }}"></i>
          </div>
          @endif
          @if($service->image)
          <div class="service-image">
            <img src="{{ asset('storage/' . $service->image) }}" class="img-fluid" alt="{{ $service->title }}">
          </div>
          @endif
          <h3><a href="{{ route('services.show', $service) }}" class="stretched-link">{{ $service->title }}</a></h3>
          <p>{{ $service->short_description }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@endsection
