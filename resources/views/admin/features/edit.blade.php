@extends('layouts.admin')

@section('title', 'Edit Feature - Admin')
@section('page-title', 'Edit Feature')

@section('content')

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Edit Feature</div>
      <div class="card-body" style="padding: 20px;">
        <form method="POST" action="{{ route('admin.features.update', $feature) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label>Title *</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $feature->title) }}" required>
            @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Description *</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" required>{{ old('description', $feature->description) }}</textarea>
            @error('description')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Icon File (Image)</label>
            @if($feature->icon_file)
            <div class="mb-2">
              <img src="{{ asset('storage/' . $feature->icon_file) }}" alt="Feature Icon" style="max-width: 100px; max-height: 100px;">
            </div>
            @endif
            <input type="file" name="icon_file" class="form-control @error('icon_file') is-invalid @enderror" accept="image/*">
            <small class="form-text text-muted">Accepted: JPEG, PNG, GIF, SVG, WebP | Max size: 2MB</small>
            @error('icon_file')<span class="invalid-feedback d-block">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Order</label>
            <input type="number" name="order" class="form-control @error('order') is-invalid @enderror" value="{{ old('order', $feature->order) }}">
            @error('order')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>
              <input type="checkbox" name="published" value="1" @if(old('published', $feature->published)) checked @endif>
              Published
            </label>
          </div>

          <button type="submit" class="btn btn-primary">Update Feature</button>
          <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
