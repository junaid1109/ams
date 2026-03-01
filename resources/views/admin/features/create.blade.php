@extends('layouts.admin')

@section('title', 'Create Feature - Admin')
@section('page-title', 'Create Feature')

@section('content')

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Create New Feature</div>
      <div class="card-body" style="padding: 20px;">
        <form method="POST" action="{{ route('admin.features.store') }}" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label>Title *</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
            @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Description *</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" required>{{ old('description') }}</textarea>
            @error('description')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Icon File (Image)</label>
            <input type="file" name="icon_file" class="form-control @error('icon_file') is-invalid @enderror" accept="image/*">
            <small class="form-text text-muted">Accepted: JPEG, PNG, GIF, SVG, WebP | Max size: 2MB</small>
            @error('icon_file')<span class="invalid-feedback d-block">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Order</label>
            <input type="number" name="order" class="form-control @error('order') is-invalid @enderror" value="{{ old('order', 0) }}">
            @error('order')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>
              <input type="checkbox" name="published" value="1" @if(old('published', true)) checked @endif>
              Published
            </label>
          </div>

          <button type="submit" class="btn btn-primary">Create Feature</button>
          <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
