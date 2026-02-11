@extends('layouts.admin')

@section('title', 'Edit Home Section - Admin')
@section('page-title', 'Edit Home Page Section')

@section('content')

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Edit Section: {{ ucwords(str_replace('-', ' ', $homeSection->section_name)) }}</div>
      <div class="card-body" style="padding: 20px;">
        <form method="POST" action="{{ route('admin.home-sections.update', $homeSection) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label>Section Name (Unique identifier) *</label>
            <input type="text" name="section_name" class="form-control @error('section_name') is-invalid @enderror" value="{{ old('section_name', $homeSection->section_name) }}" required placeholder="e.g., hero, about, services">
            <small class="form-text text-muted">Use lowercase with hyphens (e.g., hero, hero-banner, why-us)</small>
            @error('section_name')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Title *</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $homeSection->title) }}" required>
            @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Subtitle</label>
            <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" value="{{ old('subtitle', $homeSection->subtitle) }}">
            @error('subtitle')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $homeSection->description) }}</textarea>
            @error('description')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Button Text</label>
            <input type="text" name="button_text" class="form-control @error('button_text') is-invalid @enderror" value="{{ old('button_text', $homeSection->button_text) }}">
            @error('button_text')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Button Link</label>
            <input type="text" name="button_link" class="form-control @error('button_link') is-invalid @enderror" value="{{ old('button_link', $homeSection->button_link) }}" placeholder="e.g., /services or https://example.com">
            @error('button_link')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Image</label>
            @if($homeSection->image)
            <div style="margin-bottom: 10px;">
              <img src="{{ asset('storage/' . $homeSection->image) }}" alt="{{ $homeSection->title }}" style="max-width: 200px; max-height: 150px;">
              <br><small class="text-muted">Current image</small>
            </div>
            @endif
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
            <small class="form-text text-muted">Upload a new image to replace the current one</small>
            @error('image')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Display Order</label>
            <input type="number" name="display_order" class="form-control @error('display_order') is-invalid @enderror" value="{{ old('display_order', $homeSection->display_order) }}" min="0">
            <small class="form-text text-muted">Lower numbers appear first</small>
            @error('display_order')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>
              <input type="checkbox" name="is_active" value="1" @if(old('is_active', $homeSection->is_active)) checked @endif>
              Active (Show on homepage)
            </label>
          </div>

          <button type="submit" class="btn btn-primary">Update Section</button>
          <a href="{{ route('admin.home-sections.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
