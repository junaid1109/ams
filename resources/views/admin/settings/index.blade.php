@extends('layouts.admin')

@section('title', 'Settings - Admin')
@section('page-title', 'Settings')

@section('content')

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Website Settings</div>
      <div class="card-body" style="padding: 20px;">
        <form method="POST" action="{{ route('admin.settings.update') }}">
          @csrf

          <h4 class="mb-3">General Settings</h4>

          <div class="form-group">
            <label>Site Name</label>
            <input type="text" name="site_name" class="form-control @error('site_name') is-invalid @enderror" value="{{ old('site_name', $settings['site_name'] ?? 'AMS') }}">
            @error('site_name')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Site Tagline</label>
            <input type="text" name="site_tagline" class="form-control @error('site_tagline') is-invalid @enderror" value="{{ old('site_tagline', $settings['site_tagline'] ?? 'Professional Business Solutions') }}">
            @error('site_tagline')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Site Email</label>
            <input type="email" name="site_email" class="form-control @error('site_email') is-invalid @enderror" value="{{ old('site_email', $settings['site_email'] ?? 'info@ams.com') }}">
            @error('site_email')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Site Phone</label>
            <input type="tel" name="site_phone" class="form-control @error('site_phone') is-invalid @enderror" value="{{ old('site_phone', $settings['site_phone'] ?? '') }}">
            @error('site_phone')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Site Address</label>
            <textarea name="site_address" class="form-control @error('site_address') is-invalid @enderror" rows="3">{{ old('site_address', $settings['site_address'] ?? '') }}</textarea>
            @error('site_address')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Site Description</label>
            <textarea name="site_description" class="form-control @error('site_description') is-invalid @enderror" rows="4">{{ old('site_description', $settings['site_description'] ?? '') }}</textarea>
            @error('site_description')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <hr>
          <h4 class="mb-3">Social Media Links</h4>

          <div class="form-group">
            <label>Facebook URL</label>
            <input type="url" name="facebook_url" class="form-control @error('facebook_url') is-invalid @enderror" value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}">
            @error('facebook_url')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Twitter URL</label>
            <input type="url" name="twitter_url" class="form-control @error('twitter_url') is-invalid @enderror" value="{{ old('twitter_url', $settings['twitter_url'] ?? '') }}">
            @error('twitter_url')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>LinkedIn URL</label>
            <input type="url" name="linkedin_url" class="form-control @error('linkedin_url') is-invalid @enderror" value="{{ old('linkedin_url', $settings['linkedin_url'] ?? '') }}">
            @error('linkedin_url')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Instagram URL</label>
            <input type="url" name="instagram_url" class="form-control @error('instagram_url') is-invalid @enderror" value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}">
            @error('instagram_url')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <button type="submit" class="btn btn-primary">Save Settings</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
