@extends('layouts.admin')

@section('title', 'Create Portfolio Item - Admin')
@section('page-title', 'Create Portfolio Item')

@section('content')

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Create New Portfolio Item</div>
      <div class="card-body" style="padding: 20px;">
        <form method="POST" action="{{ route('admin.portfolio.store') }}" enctype="multipart/form-data">
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
            <label>Category</label>
            <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}">
            @error('category')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
            @error('image')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Secondary Image</label>
            <input type="file" name="image_secondary" class="form-control @error('image_secondary') is-invalid @enderror" accept="image/*">
            @error('image_secondary')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Client</label>
            <input type="text" name="client" class="form-control @error('client') is-invalid @enderror" value="{{ old('client') }}">
            @error('client')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Project URL</label>
            <input type="url" name="project_url" class="form-control @error('project_url') is-invalid @enderror" value="{{ old('project_url') }}">
            @error('project_url')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Project Date</label>
            <input type="date" name="project_date" class="form-control @error('project_date') is-invalid @enderror" value="{{ old('project_date') }}">
            @error('project_date')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Details (HTML)</label>
            <textarea name="details" class="form-control @error('details') is-invalid @enderror" rows="6">{{ old('details') }}</textarea>
            @error('details')<span class="invalid-feedback">{{ $message }}</span>@enderror
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

          <button type="submit" class="btn btn-primary">Create Portfolio Item</button>
          <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
