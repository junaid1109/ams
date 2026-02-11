@extends('layouts.app')

@section('title', (isset($siteName) ? $siteName : 'AMS') . ' - Portfolio')

@section('content')

<!-- Page Title Section -->
<section class="page-title light-background" style="padding-top: 100px; padding-bottom: 60px;">
  <div class="container">
    <h1>Portfolio</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Portfolio</li>
      </ol>
    </nav>
  </div>
</section>

<!-- Portfolio Section -->
<section class="portfolio section">
  <div class="container">
    <div class="portfolio-filters">
      <button class="portfolio-filter active" data-filter="*">All</button>
      @foreach($categories as $category)
      <button class="portfolio-filter" data-filter=".filter-{{ $category->category }}">{{ $category->category }}</button>
      @endforeach
    </div>

    <div class="row gy-4 isotope-container">
      @foreach($portfolios as $portfolio)
      <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $portfolio->category }}">
        @if($portfolio->image)
        <img src="{{ asset('storage/' . $portfolio->image) }}" class="img-fluid" alt="{{ $portfolio->title }}">
        @endif
        <div class="portfolio-info">
          <h4><a href="{{ route('portfolio.show', $portfolio) }}" title="More Details">{{ $portfolio->title }}</a></h4>
          <p>{{ $portfolio->category }}</p>
          @if($portfolio->image)
          <a href="{{ asset('storage/' . $portfolio->image) }}" title="{{ $portfolio->title }}" data-gallery="portfolio-gallery" class="glightbox preview-link">
            <i class="bi bi-zoom-in"></i>
          </a>
          @endif
          <a href="{{ route('portfolio.show', $portfolio) }}" title="More Details" class="details-link">
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
      document.querySelectorAll('.portfolio-filter').forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      
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
