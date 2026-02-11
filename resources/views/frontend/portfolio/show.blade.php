@extends('layouts.app')

@section('title', $portfolio->title . ' - ' . (isset($siteName) ? $siteName : 'AMS'))
@section('meta_description', $portfolio->description)

@section('content')

<!-- Page Title Section -->
<section class="page-title light-background" style="padding-top: 100px; padding-bottom: 60px;">
  <div class="container">
    <h1>{{ $portfolio->title }}</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('portfolio.index') }}">Portfolio</a></li>
        <li class="breadcrumb-item active">{{ $portfolio->title }}</li>
      </ol>
    </nav>
  </div>
</section>

<!-- Portfolio Details -->
<section class="portfolio-details section">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-8">
        @if($portfolio->image)
        <img src="{{ asset('storage/' . $portfolio->image) }}" class="img-fluid rounded mb-4" alt="{{ $portfolio->title }}">
        @endif

        @if($portfolio->image_secondary)
        <img src="{{ asset('storage/' . $portfolio->image_secondary) }}" class="img-fluid rounded mb-4" alt="{{ $portfolio->title }}">
        @endif

        <h3>{{ $portfolio->title }}</h3>
        <p>{{ $portfolio->description }}</p>

        @if($portfolio->details)
        <h4 class="mt-4">Project Details</h4>
        <p>{!! $portfolio->details !!}</p>
        @endif
      </div>

      <div class="col-lg-4">
        <div class="portfolio-info">
          <h3>Project Information</h3>
          <ul>
            @if($portfolio->client)
            <li><strong>Client:</strong> {{ $portfolio->client }}</li>
            @endif
            @if($portfolio->category)
            <li><strong>Category:</strong> {{ $portfolio->category }}</li>
            @endif
            @if($portfolio->project_date)
            <li><strong>Project Date:</strong> {{ $portfolio->project_date->format('M d, Y') }}</li>
            @endif
            @if($portfolio->project_url)
            <li><strong>Project URL:</strong> <a href="{{ $portfolio->project_url }}" target="_blank">Visit Project</a></li>
            @endif
          </ul>
        </div>

        @if($relatedPortfolios->count() > 0)
        <div class="sidebar mt-4">
          <h4 class="sidebar-title">Related Projects</h4>
          <ul class="sidebar-list">
            @foreach($relatedPortfolios as $related)
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
