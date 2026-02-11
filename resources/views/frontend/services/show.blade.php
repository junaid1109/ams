@extends('layouts.app')

@section('title', $service->title . ' - ' . (isset($siteName) ? $siteName : 'AMS'))
@section('meta_description', $service->short_description)

@section('content')

<!-- Page Title Section -->
<section class="page-title light-background" style="padding-top: 100px; padding-bottom: 60px;">
  <div class="container">
    <h1>{{ $service->title }}</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
        <li class="breadcrumb-item active">{{ $service->title }}</li>
      </ol>
    </nav>
  </div>
</section>

<!-- Service Details Section -->
<section class="service-details section">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-8">
        @if($service->image)
        <img src="{{ asset('storage/' . $service->image) }}" class="img-fluid rounded mb-4" alt="{{ $service->title }}">
        @endif

        <h3>{{ $service->title }}</h3>
        <p>{{ $service->description }}</p>

        @if($service->features)
        <h4 class="mt-4">Key Features</h4>
        <p>{!! $service->features !!}</p>
        @endif

        @if($service->pricing)
        <h4 class="mt-4">Pricing</h4>
        <p>{!! $service->pricing !!}</p>
        @endif
      </div>

      <div class="col-lg-4">
        <!-- Related Services -->
        <div class="sidebar">
          <h4 class="sidebar-title">Related Services</h4>
          <ul class="sidebar-list">
            @foreach($relatedServices as $related)
            <li>
              <a href="{{ route('services.show', $related) }}">{{ $related->title }}</a>
            </li>
            @endforeach
          </ul>
        </div>

        <!-- CTA -->
        <div class="cta-box mt-4">
          <h4>Need this service?</h4>
          <p>Get in touch with us today to discuss how we can help your business.</p>
          <a href="{{ route('contact.index') }}" class="btn btn-primary">Contact Us</a>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
