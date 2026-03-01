@extends('layouts.app')

@section('title', (isset($siteName) ? $siteName : 'AMS') . ' - Frequently Asked Questions')

@section('content')

<!-- Page Title Section -->
<section class="light-background page-title" style="padding-top: 100px; padding-bottom: 60px;">
  <div class="container">
    <h1>Frequently Asked Questions</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">FAQs</li>
      </ol>
    </nav>
  </div>
</section>

<!-- FAQ Section -->
<section class="faq section">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        @if($faqs->count())
        <div class="accordion accordion-flush" id="faqAccordion">
          @foreach($faqs as $index => $faq)
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button @if($index > 0) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="@if($index === 0) true @else false @endif">
                {{ $faq->question }}
              </button>
            </h2>
            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse @if($index === 0) show @endif" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                {!! $faq->answer !!}
              </div>
            </div>
          </div>
          @endforeach
        </div>
        @else
        <div class="alert alert-info text-center">
          <h4>No FAQs available at this time</h4>
          <p>Please check back later or <a href="{{ route('contact.index') }}">contact us</a> directly.</p>
        </div>
        @endif
      </div>
    </div>
  </div>
</section>

<style>
  .faq {
    padding: 60px 0;
  }

  .accordion {
    border: 1px solid #e0e7ff;
    border-radius: 8px;
    overflow: hidden;
  }

  .accordion-item {
    border-bottom: 1px solid #e0e7ff;
  }

  .accordion-item:last-child {
    border-bottom: none;
  }

  .accordion-button {
    padding: 20px;
    font-weight: 600;
    color: #313131;
    background-color: #f8f9fa;
    border: none;
    font-size: 1.1rem;
  }

  .accordion-button:not(.collapsed) {
    background-color: #0ea5e9;
    color: white;
    box-shadow: none;
  }

  .accordion-button:focus {
    box-shadow: none;
    border-color: transparent;
  }

  .accordion-body {
    padding: 20px;
    font-size: 1rem;
    color: #666;
    line-height: 1.8;
  }

  .accordion-body a {
    color: #0ea5e9;
    text-decoration: none;
  }

  .accordion-body a:hover {
    text-decoration: underline;
  }


</style>

@endsection
