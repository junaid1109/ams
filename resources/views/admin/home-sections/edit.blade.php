@extends('layouts.admin')

@section('title', 'Edit Home Section - Admin')
@section('page-title', 'Edit Home Page Section')

@section('content')

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Edit Section: {{ ucwords(str_replace('-', ' ', $homeSection->section_name)) }}</div>
      <div class="card-body" style="padding: 20px;">
        <form method="POST" action="{{ route('admin.home-sections.update', $homeSection) }}" enctype="multipart/form-data" id="section-form">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label>Section Name (Unique identifier) *</label>
            <input type="text" class="form-control" value="{{ $homeSection->section_name }}" disabled>
            <input type="hidden" name="section_name" value="{{ $homeSection->section_name }}">
            <small class="form-text text-muted">Cannot be changed after creation</small>
          </div>

          @if($homeSection->section_name === 'advisory_intro')
          <!-- Advisory Intro Section: Only Title and Subtitle -->
          <div class="form-group">
            <label>Title *</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $homeSection->title) }}" required>
            @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Subtitle</label>
            <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" value="{{ old('subtitle', $homeSection->subtitle) }}">
            @error('subtitle')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          @elseif(!str_contains($homeSection->section_name, 'advisory_text_block') && $homeSection->section_name !== 'section-name')
          <div class="form-group">
            <label>Title *</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $homeSection->title) }}" required>
            @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Subtitle</label>
            <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" value="{{ old('subtitle', $homeSection->subtitle) }}">
            @error('subtitle')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Tagline (Sub-heading below Title)</label>
            <input type="text" name="tagline" class="form-control @error('tagline') is-invalid @enderror" value="{{ old('tagline', $homeSection->tagline) }}" placeholder="e.g., Discover what sets us apart">
            @error('tagline')<span class="invalid-feedback">{{ $message }}</span>@enderror
            <small class="form-text text-muted">This appears below the section title</small>
          </div>
          @elseif($homeSection->section_name === 'section-name')
          <div class="form-group">
            <label>Title *</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $homeSection->title) }}" required>
            @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>
          @endif

          @if($homeSection->section_name === 'section-name')
          <div class="form-group">
            <label>Subtitle</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $homeSection->description) }}</textarea>
            @error('description')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>
          @elseif($homeSection->section_name !== 'advisory_intro')
          <div class="form-group">
            <label>Description</label>
            <textarea name="description" id="editor-{{ $homeSection->id }}" class="form-control @error('description') is-invalid @enderror">{{ old('description', $homeSection->description) }}</textarea>
            @error('description')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>
          @endif

          @if(!str_contains($homeSection->section_name, 'advisory_text_block') && $homeSection->section_name !== 'section-name' && $homeSection->section_name !== 'advisory_intro')
          <div class="form-group">
            <label>Button Text</label>
            <input type="text" name="button_text" class="form-control @error('button_text') is-invalid @enderror" value="{{ old('button_text', $homeSection->button_text) }}">
            @error('button_text')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Button Link</label>
            <input type="text" name="button_link" class="form-control @error('button_link') is-invalid @enderror" value="{{ old('button_link', $homeSection->button_link) }}" placeholder="e.g., /services or https://example.com">
            @error('button_link')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <div class="form-group">
            <label>Image</label>
            @if($homeSection->image)
            <div style="margin-bottom: 10px;">
              <img src="{{ asset('storage/' . $homeSection->image) }}" alt="{{ $homeSection->title }}" style="max-width: 200px; max-height: 150px;" id="image-preview">
              <br><small class="text-muted">Current image</small>
            </div>
            @endif
            <input type="file" name="image" id="image-input" class="form-control @error('image') is-invalid @enderror" accept="image/*">
            <small class="form-text text-muted">Upload a new image to replace the current one</small>
            <div id="preview-container" style="margin-top: 15px;"></div>
            @error('image')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>
          @endif

          <div class="form-group">
            <label>Display Order</label>
            <input type="number" name="display_order" class="form-control @error('display_order') is-invalid @enderror" value="{{ old('display_order', $homeSection->display_order) }}" min="0">
            <small class="form-text text-muted">Lower numbers appear first</small>
            @error('display_order')<span class="invalid-feedback">{{ $message }}</span>@enderror
          </div>

          <!-- Stats Section -->
          @if($homeSection->section_name === 'hero' || $homeSection->section_name === 'about' || $homeSection->section_name === 'why-us' || strpos($homeSection->section_name, 'stats') !== false)
          <div class="form-group">
            <label><strong>Stats Items (Numbers with Labels)</strong></label>
            @php
              $isPredefined = in_array($homeSection->section_name, ['hero', 'about']);
              $rawContent = $homeSection->content;
              $stats = [];
              
              if (is_array($rawContent)) {
                $stats = $rawContent;
              } elseif (is_string($rawContent) && !empty($rawContent)) {
                $decoded = json_decode($rawContent, true);
                $stats = (is_array($decoded)) ? $decoded : [];
              }
              
              if (!is_array($stats)) {
                $stats = [];
              }
            @endphp

            @if($isPredefined)
            <small class="form-text text-muted d-block mb-3">Edit existing stats below. You cannot add new stats to this section.</small>
            @else
            <small class="form-text text-muted d-block mb-3">Update existing stats or add new ones.</small>
            @endif

            @if(count($stats) > 0)
            <div style="background: #d4edda; padding: 10px; border-radius: 5px; margin-bottom: 15px; border-left: 4px solid #28a745;">
              <small class="text-success"><strong>{{ count($stats) }} stat(s) found.</strong></small>
            </div>
            @else
            <div style="background: #fff3cd; padding: 10px; border-radius: 5px; margin-bottom: 15px; border-left: 4px solid #ffc107;">
              <small class="text-warning"><strong>No stats yet.</strong></small>
            </div>
            @endif

            <div id="stats-container">
              @foreach($stats as $index => $stat)
              <div class="stat-item-group" style="background: #f8f9fa; padding: 15px; border-radius: 5px; margin-bottom: 10px; border-left: 3px solid #007bff;">
                <div style="display: flex; gap: 10px; align-items: flex-start;">
                  <div style="flex: 1;">
                    <label style="font-size: 0.85rem; color: #666; margin-bottom: 5px; display: block;">Number</label>
                    <input type="text" name="stats[{{ $index }}][number]" class="form-control stat-number" placeholder="e.g., 850" value="{{ $stat['number'] ?? '' }}" style="font-weight: 600; font-size: 1.2rem;">
                  </div>
                  <div style="flex: 2;">
                    <label style="font-size: 0.85rem; color: #666; margin-bottom: 5px; display: block;">Label</label>
                    <input type="text" name="stats[{{ $index }}][label]" class="form-control stat-label" placeholder="e.g., Projects Completed" value="{{ $stat['label'] ?? '' }}">
                  </div>
                  @if(!$isPredefined)
                  <div style="padding-top: 24px;">
                    <button type="button" class="btn btn-danger btn-sm remove-stat-btn">Remove</button>
                  </div>
                  @endif
                </div>
              </div>
              @endforeach
            </div>

            @if(!$isPredefined)
            <button type="button" class="btn btn-sm btn-success" id="add-stat-btn">+ Add Another Stat</button>
            @endif
          </div>
          @endif

          <!-- Button Display Settings for Portfolio Conclusion -->
          @if($homeSection->section_name === 'portfolio-conclusion')
          <hr>
          <div class="form-group">
            <label><strong>Button Display Settings</strong></label>
            <small class="form-text text-muted d-block mb-3">Control which buttons appear on the frontend.</small>

            <div class="form-check mb-3">
              <input type="checkbox" id="portfolio_cta_button_enabled" name="portfolio_cta_button_enabled" class="form-check-input" value="1" @if(old('portfolio_cta_button_enabled', $homeSection->portfolio_cta_button_enabled ?? true)) checked @endif>
              <label class="form-check-label" for="portfolio_cta_button_enabled">
                <strong>Enable "Start Conversation" Button</strong>
                <small class="d-block text-muted">Shows the primary CTA button</small>
              </label>
            </div>

            <div class="form-check">
              <input type="checkbox" id="portfolio_more_projects_button_enabled" name="portfolio_more_projects_button_enabled" class="form-check-input" value="1" @if(old('portfolio_more_projects_button_enabled', $homeSection->portfolio_more_projects_button_enabled ?? true)) checked @endif>
              <label class="form-check-label" for="portfolio_more_projects_button_enabled">
                <strong>Enable "View All Projects" Button</strong>
                <small class="d-block text-muted">Shows the secondary button linking to all projects</small>
              </label>
            </div>
          </div>
          @endif

          <div class="form-group">
            <label>
              <input type="checkbox" name="is_active" value="1" @if(old('is_active', $homeSection->is_active)) checked @endif>
              Active (Show on homepage)
            </label>
          </div>

          <button type="submit" class="btn btn-primary">Update Section</button>
          <a href="{{ route('admin.home-sections.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  
  // Image Preview
  const imageInput = document.getElementById('image-input');
  if (imageInput) {
    imageInput.addEventListener('change', function(e) {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
          let previewContainer = document.getElementById('preview-container');
          previewContainer.innerHTML = '<div style="margin-top: 10px;"><strong>Preview:</strong><br><img src="' + event.target.result + '" style="max-width: 300px; max-height: 300px; border-radius: 5px; margin-top: 10px;"></div>';
        };
        reader.readAsDataURL(file);
      }
    });
  }

  // Stats Counter for unique names
  let statsCounter = {{ count($stats ?? []) }};

  // Add Stat Button
  const addStatBtn = document.getElementById('add-stat-btn');
  if (addStatBtn) {
    addStatBtn.addEventListener('click', function() {
      const container = document.getElementById('stats-container');
      if (!container) return;
      
      const html = `
        <div class="stat-item-group" style="background: #f8f9fa; padding: 15px; border-radius: 5px; margin-bottom: 10px; border-left: 3px solid #007bff;">
          <div style="display: flex; gap: 10px; align-items: flex-start;">
            <div style="flex: 1;">
              <label style="font-size: 0.85rem; color: #666; margin-bottom: 5px; display: block;">Number</label>
              <input type="text" name="stats[${statsCounter}][number]" class="form-control stat-number" placeholder="e.g., 850" style="font-weight: 600; font-size: 1.2rem;">
            </div>
            <div style="flex: 2;">
              <label style="font-size: 0.85rem; color: #666; margin-bottom: 5px; display: block;">Label</label>
              <input type="text" name="stats[${statsCounter}][label]" class="form-control stat-label" placeholder="e.g., Projects Completed">
            </div>
            <div style="padding-top: 24px;">
              <button type="button" class="btn btn-danger btn-sm remove-stat-btn">Remove</button>
            </div>
          </div>
        </div>
      `;
      container.insertAdjacentHTML('beforeend', html);
      statsCounter++;
    });
  }

  // Remove Stat Button (Event Delegation)
  document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-stat-btn')) {
      e.target.closest('.stat-item-group').remove();
    }
  });

  // Initialize CKEditor for description field (only for sections that are not 'section-name' or 'advisory_intro')
  @if($homeSection->section_name !== 'section-name' && $homeSection->section_name !== 'advisory_intro')
  const editorId = 'editor-{{ $homeSection->id }}';
  const editorElement = document.getElementById(editorId);
  
  if (editorElement) {
    // Store editor instance globally
    let editor = null;
    
    ClassicEditor
      .create(editorElement, {
        ckfinder: {
          uploadUrl: "{{ route('admin.upload.image') }}"
        }
      })
      .then(instance => {
        editor = instance;
        
        // Before form submission, sync editor data to textarea
        const form = document.querySelector('#section-form');
        if (form) {
          form.addEventListener('submit', function(e) {
            if (editor) {
              const data = editor.getData();
              editorElement.value = data;
            }
          });
        }
      })
      .catch(error => {
        console.error('CKEditor error:', error);
      });
  }
  @endif

});
</script>

@endsection