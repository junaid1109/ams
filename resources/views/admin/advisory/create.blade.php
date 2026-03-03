@extends('layouts.admin')

@section('title', 'Create Advisory Item - Admin')
@section('page-title', 'Create Advisory Item')

@section('content')

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Create New Advisory Item</div>
      <div class="card-body" style="padding: 20px;">
        <form id="advisoryForm" method="POST" action="{{ route('admin.advisory.store') }}" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label>Title *</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
            @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Short Description *</label>
            <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="2" placeholder="Brief description (shown on listing page)">{{ old('short_description') }}</textarea>
            @error('short_description')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
            @error('image')<span class="invalid-feedback">{{ $message }}</span>@enderror
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

          <button type="submit" class="btn btn-primary">Create Advisory Item</button>
          <a href="{{ route('admin.advisory.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
