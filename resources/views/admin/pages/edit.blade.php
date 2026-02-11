@extends('layouts.admin')

@section('title', 'Edit Page - Admin')
@section('page-title', 'Edit Page')

@section('content')

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Edit Page</div>
      <div class="card-body" style="padding: 20px;">
        <form method="POST" action="{{ route('admin.pages.update', $page) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label>Title *</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $page->title) }}" required>
            @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Page Type</label>
            <select name="page_type" class="form-control @error('page_type') is-invalid @enderror">
              <option value="static" @if(old('page_type', $page->page_type) == 'static') selected @endif>Static</option>
              <option value="about" @if(old('page_type', $page->page_type) == 'about') selected @endif>About</option>
              <option value="terms" @if(old('page_type', $page->page_type) == 'terms') selected @endif>Terms</option>
              <option value="privacy" @if(old('page_type', $page->page_type) == 'privacy') selected @endif>Privacy</option>
            </select>
            @error('page_type')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Content *</label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="10" required>{{ old('content', $page->content) }}</textarea>
            @error('content')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Image</label>
            @if($page->image)
            <div class="mb-2">
              <img src="{{ asset('storage/' . $page->image) }}" alt="Page" style="max-width: 200px;">
            </div>
            @endif
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
            @error('image')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Meta Description</label>
            <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" rows="2">{{ old('meta_description', $page->meta_description) }}</textarea>
            @error('meta_description')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Meta Keywords</label>
            <input type="text" name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" value="{{ old('meta_keywords', $page->meta_keywords) }}">
            @error('meta_keywords')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>
              <input type="checkbox" name="published" value="1" @if(old('published', $page->published)) checked @endif>
              Published
            </label>
          </div>

          <button type="submit" class="btn btn-primary">Update Page</button>
          <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
