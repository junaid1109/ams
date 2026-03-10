@extends('layouts.admin')

@section('title', 'Create Advisory Text Block - Admin')
@section('page-title', 'Add Advisory Text Block')

@section('content')

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Create New Advisory Text Block</div>
      <div class="card-body" style="padding: 20px;">
        <form method="POST" action="{{ route('admin.home-sections.store') }}" enctype="multipart/form-data">
          @csrf

          <!-- Hidden section name field (auto-generated) -->
          <input type="hidden" name="section_name" value="{{ $sectionName }}">

          <div class="alert alert-info">
            <strong>ℹ️ Section Name:</strong> {{ $sectionName }}
          </div>

          <div class="form-group">
            <label>Description (Text Content) *</label>
            <textarea name="description" id="editor" class="form-control @error('description') is-invalid @enderror" placeholder="Enter the text content for this block" required>{{ old('description') }}</textarea>
            @error('description')<span class="invalid-feedback">{{ $message }}</span>@enderror
            <small class="form-text text-muted">This text will appear on the Advisory page</small>
          </div>

          <script>
            document.addEventListener('DOMContentLoaded', function() {
              let editor = null;
              
              ClassicEditor
                .create(document.querySelector('#editor'), {
                  ckfinder: {
                    uploadUrl: "{{ route('admin.upload.image') }}"
                  }
                })
                .then(instance => {
                  editor = instance;
                  
                  // Before form submission, sync editor data to textarea
                  const form = document.querySelector('form');
                  if (form) {
                    form.addEventListener('submit', function(e) {
                      if (editor) {
                        const data = editor.getData();
                        document.querySelector('#editor').value = data;
                      }
                    });
                  }
                })
                .catch(error => {
                  console.error('CKEditor error:', error);
                });
            });
          </script>

          <div class="form-group">
            <label>Display Order</label>
            <input type="number" name="display_order" class="form-control @error('display_order') is-invalid @enderror" value="{{ old('display_order', 0) }}" min="0">
            <small class="form-text text-muted">Lower numbers appear first</small>
            @error('display_order')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>
              <input type="checkbox" name="is_active" value="1" @if(old('is_active', true)) checked @endif>
              Active (Show on Advisory page)
            </label>
          </div>

          <button type="submit" class="btn btn-primary">Create Text Block</button>
          <a href="{{ route('admin.advisory.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
