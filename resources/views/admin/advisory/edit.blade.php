@extends('layouts.admin')

@section('title', 'Edit Advisory Item - Admin')
@section('page-title', 'Edit Advisory Item')

@section('content')

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Edit Advisory Item</div>
      <div class="card-body" style="padding: 20px;">
        <form id="advisoryForm" method="POST" action="{{ route('admin.advisory.update', $advisory) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label>Title *</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $advisory->title) }}" required>
            @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Description *</label>
            <textarea id="description-editor" name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $advisory->description) }}</textarea>
            @error('description')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Category</label>
            <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category', $advisory->category) }}">
            @error('category')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Image</label>
            @if($advisory->image)
            <div class="mb-2">
              <img src="{{ asset('storage/' . $advisory->image) }}" alt="Advisory" style="max-width: 200px;">
            </div>
            @endif
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
            @error('image')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Secondary Image</label>
            @if($advisory->image_secondary)
            <div class="mb-2">
              <img src="{{ asset('storage/' . $advisory->image_secondary) }}" alt="Advisory" style="max-width: 200px;">
            </div>
            @endif
            <input type="file" name="image_secondary" class="form-control @error('image_secondary') is-invalid @enderror" accept="image/*">
            @error('image_secondary')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Client</label>
            <input type="text" name="client" class="form-control @error('client') is-invalid @enderror" value="{{ old('client', $advisory->client) }}">
            @error('client')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Project Date</label>
            <input type="date" name="project_date" class="form-control @error('project_date') is-invalid @enderror" value="{{ old('project_date', $advisory->project_date ? $advisory->project_date->format('Y-m-d') : '') }}">
            @error('project_date')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Order</label>
            <input type="number" name="order" class="form-control @error('order') is-invalid @enderror" value="{{ old('order', $advisory->order) }}">
            @error('order')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>
              <input type="checkbox" name="published" value="1" @if(old('published', $advisory->published)) checked @endif>
              Published
            </label>
          </div>

          <button type="submit" class="btn btn-primary">Update Advisory Item</button>
          <a href="{{ route('admin.advisory.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  let descriptionEditor;

  class CustomUploadAdapter {
    constructor(loader) {
      this.loader = loader;
    }

    upload() {
      return this.loader.file.then(file => new Promise((resolve, reject) => {
        const formData = new FormData();
        formData.append('upload', file);
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

        fetch('{{ route("admin.upload.image") }}', {
          method: 'POST',
          body: formData,
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          }
        })
        .then(response => response.json())
        .then(data => {
          if (data.url) {
            resolve({ default: data.url });
          } else {
            reject('Upload failed');
          }
        })
        .catch(error => reject(error));
      }));
    }

    abort() {
      // Abort upload
    }
  }

  const editorConfig = {
    toolbar: ['heading', '|', 'bold', 'italic', '|', 'bulletedList', 'numberedList', '|', 'link', 'imageUpload', 'blockQuote', '|', 'insertTable', '|', 'undo', 'redo'],
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
    .then(editor => {
      descriptionEditor = editor;
      editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
        return new CustomUploadAdapter(loader);
      };
    })
    .catch(err => console.error('Description Editor:', err));

  // Sync editor data back to textareas before form submission
  document.getElementById('advisoryForm').addEventListener('submit', function(e) {
    if (descriptionEditor) {
      document.querySelector('#description-editor').value = descriptionEditor.getData();
    }
  });
</script>

@endsection
