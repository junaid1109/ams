@extends('layouts.app')

@php
  $currentMenu = \App\Models\Menu::getCurrentPageMenu();
  $pageTitle = $currentMenu?->label ?? 'Portfolio';
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

<!-- Portfolio Section -->
<section class="portfolio section">
  <div class="container">
    <div class="portfolio-filters" style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; margin-bottom: 40px;">
      <button class="portfolio-filter active" data-filter="*" style="padding: 10px 24px; border: 2px solid #0ea5e9; background: #0ea5e9; color: white; border-radius: 25px; cursor: pointer; font-weight: 500; transition: all 0.3s ease;">All</button>
      @foreach($categories as $category)
      <button class="portfolio-filter" data-filter=".filter-{{ $category->category }}" style="padding: 10px 24px; border: 2px solid #e0e7ff; background: transparent; color: #666; border-radius: 25px; cursor: pointer; font-weight: 500; transition: all 0.3s ease;">{{ $category->category }}</button>
      @endforeach
    </div>

    <div class="row gy-4 isotope-container">
      @foreach($services as $service)
      <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $service->category }}">
        @if($service->image)
        <img src="{{ asset('storage/' . $service->image) }}" class="img-fluid" alt="{{ $service->title }}">
        @endif
        <div class="portfolio-info">
          <h4><a href="{{ route('portfolio.show', $service) }}" title="More Details">{{ $service->title }}</a></h4>
          <p>{{ $service->category }}</p>
          @if($service->image)
          <a href="{{ asset('storage/' . $service->image) }}" title="{{ $service->title }}" data-gallery="portfolio-gallery" class="glightbox preview-link">
            <i class="bi bi-zoom-in"></i>
          </a>
          @endif
          <a href="{{ route('portfolio.show', $service) }}" title="More Details" class="details-link">
            <i class="bi bi-link-45deg"></i>
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@endsection

@push('js')
<script>
  document.querySelectorAll('.portfolio-filter').forEach(button => {
    button.addEventListener('click', function() {
      // Update active state styling
      document.querySelectorAll('.portfolio-filter').forEach(b => {
        b.classList.remove('active');
        b.style.background = 'transparent';
        b.style.color = '#666';
        b.style.borderColor = '#e0e7ff';
      });
      
      this.classList.add('active');
      this.style.background = '#0ea5e9';
      this.style.color = 'white';
      this.style.borderColor = '#0ea5e9';
      
      const filterValue = this.getAttribute('data-filter');
      document.querySelectorAll('.portfolio-item').forEach(item => {
        if (filterValue === '*' || item.className.includes(filterValue.substring(1))) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });
</script>
@endpush
