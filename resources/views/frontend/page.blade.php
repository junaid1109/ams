@extends('layouts.app')

@section('title', $page->title . ' - ' . (isset($siteName) ? $siteName : 'AMS'))
@section('meta_description', $page->meta_description)

@section('content')

<!-- Page Title Section -->
<section class="page-title light-background" style="padding-top: 100px; padding-bottom: 60px;">
  <div class="container">
    <h1>{{ $page->title }}</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">{{ $page->title }}</li>
      </ol>
    </nav>
  </div>
</section>

<!-- Page Content -->
<section class="page-content section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        @if($page->image)
        <img src="{{ asset('storage/' . $page->image) }}" class="img-fluid rounded mb-4" alt="{{ $page->title }}">
        @endif

        <div class="content">
          {!! $page->content !!}
        </div>
      </div>

      <div class="col-lg-4">
        <div class="sidebar">
          <h4>Quick Links</h4>
          <ul class="sidebar-list">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{ route('services.index') }}">Services</a></li>
            <li><a href="{{ route('portfolio.index') }}">Portfolio</a></li>
            <li><a href="{{ route('team') }}">Team</a></li>
            <li><a href="{{ route('contact.index') }}">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
