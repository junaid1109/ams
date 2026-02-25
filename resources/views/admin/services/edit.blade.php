@extends('layouts.admin')

@section('title', 'Edit Service - Admin')
@section('page-title', 'Edit Service')

@section('content')

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Edit Service</div>
      <div class="card-body" style="padding: 20px;">
        <form id="serviceForm" method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label>Title *</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $service->title) }}" required>
            @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Short Description *</label>
            <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="3" required>{{ old('short_description', $service->short_description) }}</textarea>
            @error('short_description')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Description *</label>
            <textarea id="description-editor" name="description" class="form-control @error('description') is-invalid @enderror" rows="6">{{ old('description', $service->description) }}</textarea>
            @error('description')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Icon Class (Bootstrap Icons)</label>
            <div style="display: flex; gap: 10px;">
              <select name="icon" id="icon-select" class="form-control @error('icon') is-invalid @enderror" style="flex: 1;">
                <option value="">-- Select Icon --</option>
                @forelse($icons as $icon)
                <option value="{{ $icon['class'] }}" @if(old('icon', $service->icon) === $icon['class']) selected @endif>
                  {{ $icon['emoji'] }} {{ $icon['name'] }}
                </option>
                @empty
                <option disabled>No icons available</option>
                @endforelse
              </select>
              <div id="icon-preview" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border: 1px solid #ddd; border-radius: 4px; flex-shrink: 0;">
                @if(old('icon', $service->icon))
                  <i class="{{ old('icon', $service->icon) }}" style="font-size: 24px;"></i>
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
            <label>Image</label>
            @if($service->image)
            <div class="mb-2">
              <img src="{{ asset('storage/' . $service->image) }}" alt="Service" style="max-width: 200px;">
            </div>
            @endif
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
            @error('image')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Features (HTML)</label>
            <textarea id="features-editor" name="features" class="form-control @error('features') is-invalid @enderror" rows="4">{{ old('features', $service->features) }}</textarea>
            @error('features')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Pricing (HTML)</label>
            <textarea id="pricing-editor" name="pricing" class="form-control @error('pricing') is-invalid @enderror" rows="4">{{ old('pricing', $service->pricing) }}</textarea>
            @error('pricing')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Order</label>
            <input type="number" name="order" class="form-control @error('order') is-invalid @enderror" value="{{ old('order', $service->order) }}">
            @error('order')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>
              <input type="checkbox" name="published" value="1" @if(old('published', $service->published)) checked @endif>
              Published
            </label>
          </div>

          <button type="submit" class="btn btn-primary">Update Service</button>
          <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  let descriptionEditor, featuresEditor, pricingEditor;

  const editorConfig = {
    toolbar: {
      items: [
        'heading', '|',
        'bold', 'italic', '|',
        'bulletedList', 'numberedList', '|',
        'link', 'blockQuote', '|',
        'insertTable', '|',
        'undo', 'redo'
      ]
    },
    heading: {
      options: [
        { model: 'paragraph', title: 'Paragraph' },
        { model: 'heading1', view: 'h1', title: 'Heading 1' },
        { model: 'heading2', view: 'h2', title: 'Heading 2' },
        { model: 'heading3', view: 'h3', title: 'Heading 3' }
      ]
    }
  };

  ClassicEditor.create(document.querySelector('#description-editor'), editorConfig)
    .then(editor => { descriptionEditor = editor; })
    .catch(err => console.error('Description Editor:', err));

  ClassicEditor.create(document.querySelector('#features-editor'), editorConfig)
    .then(editor => { featuresEditor = editor; })
    .catch(err => console.error('Features Editor:', err));

  ClassicEditor.create(document.querySelector('#pricing-editor'), editorConfig)
    .then(editor => { pricingEditor = editor; })
    .catch(err => console.error('Pricing Editor:', err));

  // Sync editor data back to textareas before form submission
  document.getElementById('serviceForm').addEventListener('submit', function(e) {
    if (descriptionEditor) {
      document.querySelector('#description-editor').value = descriptionEditor.getData();
    }
    if (featuresEditor) {
      document.querySelector('#features-editor').value = featuresEditor.getData();
    }
    if (pricingEditor) {
      document.querySelector('#pricing-editor').value = pricingEditor.getData();
    }
  });
</script>

@endsection
