@extends('layouts.admin')

@section('title', 'Create FAQ - Admin')
@section('page-title', 'Create FAQ')

@section('content')

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Create New FAQ</div>
      <div class="card-body" style="padding: 20px;">
        <form method="POST" action="{{ route('admin.faqs.store') }}">
          @csrf

          <div class="form-group">
            <label>Topic *</label>
            <input type="text" name="topic" class="form-control @error('topic') is-invalid @enderror" value="{{ old('topic') }}" placeholder="e.g., General, Services, Technical Support" required>
            @error('topic')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Question *</label>
            <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" value="{{ old('question') }}" placeholder="e.g., What services do you offer?" required>
            @error('question')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Answer *</label>
            <textarea id="answer-editor" name="answer" class="form-control @error('answer') is-invalid @enderror" rows="8" placeholder="Enter the answer here...">{{ old('answer') }}</textarea>
            <div id="answer-error" class="invalid-feedback" style="display: none;">Answer is required</div>
            @error('answer')<span class="invalid-feedback">{{ $message }}</span>@enderror
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

          <button type="submit" class="btn btn-primary">Create FAQ</button>
          <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  let answerEditor;

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

  ClassicEditor.create(document.querySelector('#answer-editor'), {
    toolbar: ['heading', '|', 'bold', 'italic', '|', 'bulletedList', 'numberedList', '|', 'link', 'imageUpload', 'blockQuote', '|', 'insertTable', '|', 'undo', 'redo'],
    heading: {
      options: [
        { model: 'paragraph', title: 'Paragraph' },
        { model: 'heading1', view: 'h1', title: 'Heading 1' },
        { model: 'heading2', view: 'h2', title: 'Heading 2' },
        { model: 'heading3', view: 'h3', title: 'Heading 3' }
      ]
    },
    image: {
      toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight', '|', 'imageStyle:full', 'imageStyle:side'],
      styles: [
        'full',
        'side',
        'alignLeft',
        'alignCenter',
        'alignRight'
      ]
    }
  })
  .then(editor => {
    answerEditor = editor;
    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
      return new CustomUploadAdapter(loader);
    };
  })
  .catch(err => console.error('Answer Editor:', err));

  // Sync editor data before form submission
  document.querySelector('form').addEventListener('submit', function(e) {
    if (answerEditor) {
      const content = answerEditor.getData();
      document.querySelector('#answer-editor').value = content;
      
      if (!content || content.trim() === '') {
        e.preventDefault();
        document.getElementById('answer-error').style.display = 'block';
        return false;
      } else {
        document.getElementById('answer-error').style.display = 'none';
      }
    }
  });
</script>

@endsection
