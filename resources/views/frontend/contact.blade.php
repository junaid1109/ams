@extends('layouts.app')

@section('title', (isset($siteName) ? $siteName : 'AMS') . ' - Contact')

@section('content')

<!-- Page Title Section -->
<section class="page-title light-background" style="padding-top: 100px; padding-bottom: 60px;">
  <div class="container">
    <h1>Contact</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Contact</li>
      </ol>
    </nav>
  </div>
</section>

<!-- Contact Section -->
<section class="contact section">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-4">
        <div class="info-item d-flex flex-column">
          <h4>Address</h4>
          <p>{{ \App\Helpers\SettingHelper::get('site_address', 'A108 Adam Street, New York, NY 535022, United States') }}</p>
        </div>

        <div class="info-item d-flex flex-column">
          <h4>Call Us</h4>
          <p>{{ \App\Helpers\SettingHelper::get('site_phone', '+1 5589 55488 55') }}</p>
        </div>

        <div class="info-item d-flex flex-column">
          <h4>Email Us</h4>
          <p>{{ \App\Helpers\SettingHelper::get('site_email', 'info@ams.com') }}</p>
        </div>
      </div>

      <div class="col-lg-8">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}" class="contact-form">
          @csrf
          <div class="row gy-4">
            <div class="col-md-6">
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Your Name" value="{{ old('name') }}">
              @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="col-md-6">
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your Email" value="{{ old('email') }}">
              @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone" value="{{ old('phone') }}">
              @error('phone')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" placeholder="Subject" value="{{ old('subject') }}">
              @error('subject')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="col-md-12">
              <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="6" placeholder="Message">{{ old('message') }}</textarea>
              @error('message')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Send Message</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection
