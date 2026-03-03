@extends('layouts.app')

@php
  $currentMenu = \App\Models\Menu::getCurrentPageMenu();
  $pageTitle = $currentMenu?->label ?? 'Advisory';
  $breadcrumbs = \App\Models\Menu::getBreadcrumbs();
@endphp

@section('title', (isset($siteName) ? $siteName : 'AMS') . ' - ' . $pageTitle)

<style>
  /* CKEditor Content Styling */
  .text-block-content {
    font-size: 0.95rem;
    color: #666;
    line-height: 1.8;
  }
  
  .text-block-content figure {
    float: right;
    margin: 0 0 20px 25px;
    max-width: 45%;
  }
  
  .text-block-content figure img {
    max-width: 100%;
    height: auto;
    display: block;
  }
  
  .text-block-content figcaption {
    font-size: 0.85rem;
    color: #888;
    margin-top: 8px;
    text-align: center;
    font-style: italic;
  }
  
  /* Ensure clear float after content */
  .text-block-content::after {
    content: "";
    display: table;
    clear: both;
  }

  /* Service Image Rectangle Styling */
  .service-image {
    width: calc(100% + 60px);
    margin: -30px -30px 20px -30px;
    height: 220px;
    overflow: hidden;
    border-radius: 8px 8px 0 0;
    background-color: #f5f5f5;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .service-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block !important;
  }

  .service-item {
    display: flex;
    flex-direction: column;
  }

  /* Advisory specific styles */
  .advisory-services-section {
    padding: 40px 0;
  }

  .advisory-services-section .service-item {
    padding: 30px;
    background-color: white;
    border-radius: 8px;
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  }

  .advisory-services-section .service-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
  }

  .advisory-services-section .service-item h2 {
    font-size: 20px;
    font-weight: 600;
    margin: 20px 0 15px 0;
    line-height: 1.4;
    color: #1a1a1a;
  }

  .advisory-services-section .service-item h2 a {
    text-decoration: none;
    color: #1a1a1a;
    transition: color 0.3s ease;
  }

  .advisory-services-section .service-item h2 a:hover {
    color: var(--accent-color, #0066cc);
  }

  .advisory-services-section .service-item p {
    color: #666;
    margin: 0;
    line-height: 1.6;
    flex-grow: 1;
  }
</style>

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



<!-- Advisory Section -->
<section class="advisory section" style="padding: 60px 0;">
  <div class="container">
    
    <!-- Main Heading & Sub Heading -->
    @if($advisorySection)
    <div class="text-center">
      <h2 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 15px; color: #1a1a1a;">{{ $advisorySection->title }}</h2>
      <p style="font-size: 1.1rem; color: #666; max-width: 700px; margin: 0 auto; line-height: 1.6;">{{ $advisorySection->subtitle }}</p>
    </div>
    @endif

    <!-- Image Blocks (3 per row) -->
    <section class="advisory-services-section">
      <div class="container">
        <div class="row gy-4">
          @foreach($portfolios as $portfolio)
          <div class="col-lg-3 col-md-6">
            <div class="service-item">
              @if($portfolio->image)
              <div class="service-image">
                <img src="{{ asset('storage/' . $portfolio->image) }}" class="img-fluid" alt="{{ $portfolio->title }}">
              </div>
              @endif
              <h2>{{ $portfolio->title }}</h2>
              <p>{{ $portfolio->short_description }}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>


    <!-- Dynamic Text Blocks Section -->
    @if($textBlocks->count() > 0)
    <div class="row gy-5 mt-5">
      @foreach($textBlocks as $block)
      <div class="col-md-12 text-block-content">
        <div style="overflow: auto; text-align: justify;">{!! $block->description !!}</div>
      </div>
      @endforeach
    </div>
    @endif

  </div>
</section>

@endsection
