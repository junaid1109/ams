@extends('layouts.admin')

@section('title', 'Create Feature - Admin')
@section('page-title', 'Create Feature')

@section('content')

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Create New Feature</div>
      <div class="card-body" style="padding: 20px;">
        <form method="POST" action="{{ route('admin.features.store') }}">
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
            <label>Icon Class (Bootstrap Icons)</label>
            <div style="display: flex; gap: 10px;">
              <select name="icon" id="icon-select" class="form-control @error('icon') is-invalid @enderror" style="flex: 1;">
                <option value="">-- Select Icon --</option>
                @forelse($icons as $icon)
                <option value="{{ $icon['class'] }}" @if(old('icon') === $icon['class']) selected @endif>
                  {{ $icon['emoji'] }} {{ $icon['name'] }}
                </option>
                @empty
                <option disabled>No icons available</option>
                @endforelse
              </select>
              <div id="icon-preview" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border: 1px solid #ddd; border-radius: 4px; flex-shrink: 0;">
                @if(old('icon'))
                  <i class="{{ old('icon') }}" style="font-size: 24px;"></i>
                @else
                  <small style="color: #999;">Preview</small>
                @endif
              </div>
            </div>
            @error('icon')<span class="invalid-feedback d-block">{{ $message }}</span>@enderror
          </div>

          <script>
            document.getElementById('icon-select').addEventListener('change', function() {
              const iconClass = this.value;
              const preview = document.getElementById('icon-preview');
              if (iconClass) {
                preview.innerHTML = '<i class="' + iconClass + '" style="font-size: 24px;"></i>';
              } else {
                preview.innerHTML = '<small style="color: #999;">Preview</small>';
              }
            });
          </script>

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
