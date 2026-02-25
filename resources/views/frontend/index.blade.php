@extends('layouts.app')

@section('title', (isset($siteName) ? $siteName : 'AMS') . ' - Home')

@section('content')

@php
  // Helper function to get home section content
  $getSection = function($name, $default = null) use ($homeSections) {
    if ($homeSections) {
      $section = $homeSections->firstWhere('section_name', $name);
      return $section ?: $default;
    }
    return $default;
  };
@endphp

<!-- Hero Section -->
<section id="hero" class="hero section light-background">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="hero-content">
         
          <h1 data-aos="fade-up" data-aos-delay="200">{{ $getSection('hero')?->title ?? 'Transform Your Business Vision Into Reality' }}</h1>
           @if($getSection('hero')?->subtitle)
          <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="150">{{ $getSection('hero')->subtitle }}</p>
          @endif
          <p data-aos="fade-up" data-aos-delay="300">{{ $getSection('hero')?->description ?? 'We create innovative solutions that help businesses grow. Our expertise spans web design, development, and digital marketing.' }}</p>
          <div class="hero-cta" data-aos="fade-up" data-aos-delay="400">
            @php $heroSection = $getSection('hero'); @endphp
            @if(\App\Helpers\SettingHelper::get('hero_cta_button_enabled', true))
            <a href="{{ $heroSection?->button_link ?? route('contact.index') }}" class="btn-primary">{{ $heroSection?->button_text ?? 'Get Started Today' }}</a>
            @endif
            @if(\App\Helpers\SettingHelper::get('demo_video_button_enabled', true))
            <a href="{{ \App\Helpers\SettingHelper::get('demo_video_url', 'https://www.youtube.com/watch?v=Y7f98aduVJ8') }}" class="btn-secondary glightbox">
              <i class="bi bi-play-circle"></i>
              Watch Demo
            </a>
            @endif
          </div>
          <!-- Hero Stats -->
          <div class="hero-stats" data-aos="fade-up" data-aos-delay="500">
            @php
              $heroSection = $getSection('hero');
              $heroStats = $heroSection?->content ?? [];
              if (!is_array($heroStats)) {
                $heroStats = json_decode($heroStats, true) ?? [];
              }
              // Fallback stats if none configured
              if (empty($heroStats)) {
                $heroStats = [
                  ['number' => '500+', 'label' => 'Successful Projects'],
                  ['number' => '98%', 'label' => 'Client Satisfaction'],
                  ['number' => '10+', 'label' => 'Years Experience'],
                ];
              }
            @endphp
            @foreach($heroStats as $stat)
            <div class="stat-item">
              <div class="stat-number">{{ $stat['number'] ?? '0' }}</div>
              <div class="stat-label">{{ $stat['label'] ?? 'Statistic' }}</div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        @php $heroImg = $getSection('hero')?->image; @endphp
        <img src="{{ $heroImg ? asset('storage/' . $heroImg) : asset('assets/img/about/about-square-10.webp') }}" class="img-fluid" alt="Hero Image" data-aos="zoom-out" data-aos-delay="300">
      </div>
    </div>
  </div>
</section>

<!-- About Preview Section -->
<section id="about" class="about section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row align-items-center">
      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
        <div class="content">
          @php $aboutSection = $getSection('about'); @endphp
          <h2>{{ $aboutSection?->title ?? 'Crafting Excellence Through Innovation and Dedication' }}</h2>
          <p class="lead">{{ $aboutSection?->subtitle ?? 'We are passionate professionals committed to delivering exceptional results that exceed expectations and drive meaningful transformation.' }}</p>
          <p>{{ $aboutSection?->description ?? 'We are a team of passionate professionals dedicated to transforming ideas into digital reality. With years of experience in web design, development, and digital marketing, we help businesses of all sizes achieve their goals.' }}</p>

          <!-- About Stats with Counters -->
          <div class="stats-row">
            @php
              $aboutSection = $getSection('about');
              $stats = $aboutSection?->content ?? [];
              if (!is_array($stats)) {
                $stats = json_decode($stats, true) ?? [];
              }
              // Fallback to hardcoded stats if none configured
              if (empty($stats)) {
                $stats = [
                  ['number' => 15, 'label' => 'Years Experience'],
                  ['number' => 850, 'label' => 'Projects Completed'],
                  ['number' => 240, 'label' => 'Happy Clients'],
                ];
              }
            @endphp
            @foreach($stats as $stat)
              <div class="stat-item">
                  @php
                      $rawNumber = $stat['number'] ?? '0';
                      preg_match('/[\d.]+/', $rawNumber, $matches);
                      $numericValue = $matches[0] ?? 0;
                      $suffix = preg_replace('/[\d.]+/', '', $rawNumber);
                  @endphp
                  <div class="stat-number" style="font-size: 2rem; font-weight: 300; color: #313131;">
                      <span class="purecounter" 
                            data-purecounter-start="0" 
                            data-purecounter-end="{{ $numericValue }}" 
                            data-purecounter-duration="1">0</span>{{ $suffix }}
                  </div>
                  <div class="stat-label">{{ $stat['label'] ?? 'Statistic' }}</div>
              </div>
              @endforeach
          </div>

          <div class="cta-section">
            <a href="{{ $aboutSection?->button_link ?? route('about') }}" class="btn-learn-more">{{ $aboutSection?->button_text ?? 'Learn More' }}</a>
          </div>
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
        @php $aboutImg = $getSection('about')?->image; @endphp
        <img src="{{ $aboutImg ? asset('storage/' . $aboutImg) : asset('assets/img/about/about-square-12.webp') }}" class="img-fluid rounded" alt="About Image">
      </div>
    </div>
  </div>
</section>

<!-- Services Section -->
<section id="services" class="services section light-background">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="section-title">
      @php $servicesSection = $getSection('services'); @endphp
      <h2>{{ $servicesSection?->title ?? 'Services' }}</h2>
      <p>{{ $servicesSection?->description ?? 'Check our Services' }}</p>
    </div>

    <div class="row gy-5">
      @foreach($services as $service)
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item">
          <div class="service-icon">
            @if($service->icon)
            <i class="{{ $service->icon }}"></i>
            @else
            <i class="bi bi-gear"></i>
            @endif
          </div>
          <h3><a href="{{ route('services.show', $service) }}">{{ $service->title }}</a></h3>
          <p>{{ $service->short_description }}</p>
          <a href="{{ route('services.show', $service) }}" class="service-link">
            Learn More <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Why Choose Us Section -->
<section id="why-us" class="why-us section">
  <div class="container section-title" data-aos="fade-up">
    @php $whyUsSection = $getSection('why-us'); @endphp
    <h2>{{ $whyUsSection?->title ?? 'Why Choose Us' }}</h2>
    <p>{{ $whyUsSection?->description ?? 'We deliver exceptional results through proven expertise, cutting-edge innovation, and unwavering commitment to your success.' }}</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row">
      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
        <div class="content">
          <h2>{{ $whyUsSection?->subtitle ?? 'Why Partner With Us' }}</h2>
          <p>{{ $whyUsSection?->description ?? 'We deliver exceptional results through proven expertise, cutting-edge innovation, and unwavering commitment to your success. Our comprehensive approach ensures sustainable growth and competitive advantage.' }}</p>
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
        @php $whyUsImg = $getSection('why-us')?->image; @endphp
        <img src="{{ $whyUsImg ? asset('storage/' . $whyUsImg) : asset('assets/img/about/about-8.webp') }}" alt="Professional team collaboration" class="img-fluid">
      </div>
    </div>

    <div class="features-grid" data-aos="fade-up" data-aos-delay="400">
      <div class="row g-5">
        @forelse($features as $feature)
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <div class="feature-item">
            <div class="icon-wrapper">
              @if($feature->icon)
              <i class="{{ $feature->icon }}"></i>
              @else
              <i class="bi bi-lightbulb"></i>
              @endif
            </div>
            <div class="feature-content">
              <h3>{{ $feature->title }}</h3>
              <p>{{ $feature->description }}</p>
            </div>
          </div>
        </div>
        @empty
        <div class="col-lg-12 text-center">
          <p>No features available yet.</p>
        </div>
        @endforelse
      </div>
    </div>
  </div>
</section>

<!-- Portfolio Section -->
<section id="portfolio" class="portfolio section">
  <div class="container section-title" data-aos="fade-up">
    @php $portfolioSection = $getSection('portfolio'); @endphp
    <h2>{{ $portfolioSection?->title ?? 'Check Our Portfolio' }}</h2>
    <p>{{ $portfolioSection?->description ?? 'Explore our latest projects and success stories' }}</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

      <div class="row gy-5 isotope-container" data-aos="fade-up" data-aos-delay="300">
        @forelse($portfolios as $portfolio)
        <div class="col-lg-12 portfolio-item isotope-item filter-web">
          <article class="portfolio-card">
            <div class="row g-4">
              @if($loop->even)
              <div class="col-md-6 order-md-2">
              @else
              <div class="col-md-6">
              @endif
                <div class="project-visual">
                  @if($portfolio->image)
                    <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" class="img-fluid">
                  @else
                    @php
                      $placeholders = ['portfolio-1.webp', 'portfolio-2.webp', 'portfolio-3.webp', 'portfolio-4.webp', 'portfolio-5.webp', 'portfolio-6.webp'];
                      $placeholder = $placeholders[$loop->index % count($placeholders)];
                    @endphp
                    <img src="{{ asset('assets/img/portfolio/' . $placeholder) }}" alt="{{ $portfolio->title }}" class="img-fluid">
                  @endif
                  <div class="project-overlay">
                    <div class="overlay-content">
                      @if($portfolio->image)
                        <a href="{{ asset('storage/' . $portfolio->image) }}" class="view-project glightbox" title="{{ $portfolio->title }}">
                          <i class="bi bi-eye"></i>
                        </a>
                      @else
                        <a href="{{ asset('assets/img/portfolio/' . $placeholder) }}" class="view-project glightbox" title="{{ $portfolio->title }}">
                          <i class="bi bi-eye"></i>
                        </a>
                      @endif
                      <a href="{{ route('portfolio.show', $portfolio) }}" class="project-link">
                        <i class="bi bi-arrow-up-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              @if($loop->even)
              <div class="col-md-6 order-md-1">
              @else
              <div class="col-md-6">
              @endif
                <div class="project-details">
                  <div class="project-header">
                    <span class="project-category">{{ $portfolio->category }}</span>
                  </div>
                  <h3 class="project-title">{{ $portfolio->title }}</h3>
                  <p class="project-description">{{ $portfolio->description }}</p>
                  <div class="project-meta">
                    <span class="client-name">{{ $portfolio->client ?? 'Professional Project' }}</span>
                  </div>
                </div>
              </div>
            </div>
          </article>
        </div>
        @empty
        <div class="col-lg-12 text-center">
          <p>No portfolio items available yet.</p>
        </div>
        @endforelse
      </div>
    </div>

    <div class="portfolio-conclusion" data-aos="fade-up" data-aos-delay="400">
      <div class="conclusion-content">
        @php $portfolioConclusion = $getSection('portfolio-conclusion'); @endphp
        <h4>{{ $portfolioConclusion?->title ?? 'Ready to elevate your business?' }}</h4>
        <p>{{ $portfolioConclusion?->description ?? 'Let\'s discuss how we can transform your digital presence and drive meaningful results for your organization.' }}</p>
        <div class="conclusion-actions">
          @if(\App\Helpers\SettingHelper::get('portfolio_cta_button_enabled', true))
          <a href="{{ $portfolioConclusion?->button_link ?? route('contact.index') }}" class="primary-action">
            {{ $portfolioConclusion?->button_text ?? 'Start Conversation' }}
            <i class="bi bi-arrow-right"></i>
          </a>
          @endif
          @if(\App\Helpers\SettingHelper::get('portfolio_more_projects_button_enabled', true))
          <a href="{{ route('portfolio.index') }}" class="secondary-action">
            View All Projects
          </a>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Team Section -->
<section id="team" class="team section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Meet Our Team</h2>
    <p>Our Professional Team</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-5">
      @foreach($teamMembers as $member)
      <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
        <div class="team-member">
          <div class="member-img">
            @if($member->image)
              <img src="{{ asset('storage/' . $member->image) }}" class="img-fluid" alt="{{ $member->name }}">
            @else
              @php
                $personPlaceholders = ['person-f-8.webp', 'person-m-12.webp', 'person-f-3.webp', 'person-m-7.webp', 'person-f-12.webp', 'person-m-8.webp', 'person-f-6.webp', 'person-m-12.webp'];
                $personPlaceholder = $personPlaceholders[$loop->index % count($personPlaceholders)];
              @endphp
              <img src="{{ asset('assets/img/person/' . $personPlaceholder) }}" class="img-fluid" alt="{{ $member->name }}">
            @endif
          </div>
          <div class="member-info">
            <h4>{{ $member->name }}</h4>
            <span>{{ $member->position }}</span>
            <p>{{ $member->bio }}</p>
            <div class="social">
              @if($member->twitter)<a href="{{ $member->twitter }}"><i class="bi bi-twitter-x"></i></a>@endif
              @if($member->linkedin)<a href="{{ $member->linkedin }}"><i class="bi bi-linkedin"></i></a>@endif
              @if($member->instagram)<a href="{{ $member->instagram }}"><i class="bi bi-instagram"></i></a>@endif
              @if($member->facebook)<a href="{{ $member->facebook }}"><i class="bi bi-facebook"></i></a>@endif
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Testimonials Section -->
@if($getSection('testimonials'))
<section id="testimonials" class="testimonials section light-background">
  <div class="container section-title" data-aos="fade-up">
    @php $testimonialSection = $getSection('testimonials'); @endphp
    <h2>{{ $testimonialSection?->title ?? 'What They Say' }}</h2>
    <p>{{ $testimonialSection?->description ?? 'Hear from our satisfied clients and partners' }}</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="testimonial-slider swiper init-swiper">
      <script type="application/json" class="swiper-config">
        {
          "loop": true,
          "speed": 600,
          "autoplay": {
            "delay": 4000
          },
          "slidesPerView": 1,
          "spaceBetween": 30,
          "navigation": {
            "nextEl": ".swiper-button-next",
            "prevEl": ".swiper-button-prev"
          },
          "breakpoints": {
            "768": {
              "slidesPerView": 2
            },
            "1200": {
              "slidesPerView": 3
            }
          }
        }
      </script>

      <div class="swiper-wrapper">
        <!-- Testimonial 1 -->
        <div class="swiper-slide">
          <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="200">
            <div class="testimonial-header">
              <img src="{{ asset('assets/img/person/person-f-12.webp') }}" alt="Jessica Martinez" class="img-fluid rounded-circle">
              <div class="rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
            </div>
            <div class="testimonial-body">
              <p>"Exceptional work and professionalism. The team delivered exactly what we needed and exceeded our expectations. Highly recommended!"</p>
            </div>
            <div class="testimonial-footer">
              <h5>Jessica Martinez</h5>
              <span>UX Designer</span>
              <div class="quote-icon">
                <i class="bi bi-chat-quote-fill"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Testimonial 2 -->
        <div class="swiper-slide">
          <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="300">
            <div class="testimonial-header">
              <img src="{{ asset('assets/img/person/person-m-8.webp') }}" alt="Client" class="img-fluid rounded-circle">
              <div class="rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
            </div>
            <div class="testimonial-body">
              <p>"Outstanding results and great communication throughout the project. They understood our requirements perfectly and delivered on time."</p>
            </div>
            <div class="testimonial-footer">
              <h5>David Rodriguez</h5>
              <span>Software Engineer</span>
              <div class="quote-icon">
                <i class="bi bi-chat-quote-fill"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Testimonial 3 -->
        <div class="swiper-slide">
          <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="400">
            <div class="testimonial-header">
              <img src="{{ asset('assets/img/person/person-f-6.webp') }}" alt="Amanda Wilson" class="img-fluid rounded-circle">
              <div class="rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
            </div>
            <div class="testimonial-body">
              <p>"Perfect partnership! They understood our vision and brought it to life beautifully. The attention to detail was remarkable."</p>
            </div>
            <div class="testimonial-footer">
              <h5>Amanda Wilson</h5>
              <span>Creative Director</span>
              <div class="quote-icon">
                <i class="bi bi-chat-quote-fill"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Testimonial 4 -->
        <div class="swiper-slide">
          <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="500">
            <div class="testimonial-header">
              <img src="{{ asset('assets/img/person/person-m-12.webp') }}" alt="Ryan Thompson" class="img-fluid rounded-circle">
              <div class="rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
            </div>
            <div class="testimonial-body">
              <p>"Professional team with excellent attention to detail. They delivered on time and on budget. Would work with them again in a heartbeat!"</p>
            </div>
            <div class="testimonial-footer">
              <h5>Ryan Thompson</h5>
              <span>Business Analyst</span>
              <div class="quote-icon">
                <i class="bi bi-chat-quote-fill"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Testimonial 5 -->
        <div class="swiper-slide">
          <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="600">
            <div class="testimonial-header">
              <img src="{{ asset('assets/img/person/person-f-10.webp') }}" alt="Rachel Chen" class="img-fluid rounded-circle">
              <div class="rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
            </div>
            <div class="testimonial-body">
              <p>"Fantastic collaboration and support. They truly care about client success. Our project went from concept to completion seamlessly."</p>
            </div>
            <div class="testimonial-footer">
              <h5>Rachel Chen</h5>
              <span>Project Manager</span>
              <div class="quote-icon">
                <i class="bi bi-chat-quote-fill"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="swiper-navigation">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>
  </div>
</section>
@endif


@endsection
