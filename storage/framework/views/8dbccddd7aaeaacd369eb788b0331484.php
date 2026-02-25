

<?php $__env->startSection('title', 'Edit Home Section - Admin'); ?>
<?php $__env->startSection('page-title', 'Edit Home Page Section'); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Edit Section: <?php echo e(ucwords(str_replace('-', ' ', $homeSection->section_name))); ?></div>
      <div class="card-body" style="padding: 20px;">
        <form method="POST" action="<?php echo e(route('admin.home-sections.update', $homeSection)); ?>" enctype="multipart/form-data" id="section-form">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>

          <div class="form-group">
            <label>Section Name (Unique identifier) *</label>
            <input type="text" class="form-control" value="<?php echo e($homeSection->section_name); ?>" disabled>
            <input type="hidden" name="section_name" value="<?php echo e($homeSection->section_name); ?>">
            <small class="form-text text-muted">Cannot be changed after creation</small>
          </div>

          <div class="form-group">
            <label>Title *</label>
            <input type="text" name="title" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('title', $homeSection->title)); ?>" required>
            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
            <label>Subtitle</label>
            <input type="text" name="subtitle" class="form-control <?php $__errorArgs = ['subtitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('subtitle', $homeSection->subtitle)); ?>">
            <?php $__errorArgs = ['subtitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="4"><?php echo e(old('description', $homeSection->description)); ?></textarea>
            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
            <label>Button Text</label>
            <input type="text" name="button_text" class="form-control <?php $__errorArgs = ['button_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('button_text', $homeSection->button_text)); ?>">
            <?php $__errorArgs = ['button_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
            <label>Button Link</label>
            <input type="text" name="button_link" class="form-control <?php $__errorArgs = ['button_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('button_link', $homeSection->button_link)); ?>" placeholder="e.g., /services or https://example.com">
            <?php $__errorArgs = ['button_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
            <label>Image</label>
            <?php if($homeSection->image): ?>
            <div style="margin-bottom: 10px;">
              <img src="<?php echo e(asset('storage/' . $homeSection->image)); ?>" alt="<?php echo e($homeSection->title); ?>" style="max-width: 200px; max-height: 150px;" id="image-preview">
              <br><small class="text-muted">Current image</small>
            </div>
            <?php endif; ?>
            <input type="file" name="image" id="image-input" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept="image/*">
            <small class="form-text text-muted">Upload a new image to replace the current one</small>
            <div id="preview-container" style="margin-top: 15px;"></div>
            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
            <label>Display Order</label>
            <input type="number" name="display_order" class="form-control <?php $__errorArgs = ['display_order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('display_order', $homeSection->display_order)); ?>" min="0">
            <small class="form-text text-muted">Lower numbers appear first</small>
            <?php $__errorArgs = ['display_order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <!-- Stats Section -->
          <?php if($homeSection->section_name === 'hero' || $homeSection->section_name === 'about' || $homeSection->section_name === 'why-us' || strpos($homeSection->section_name, 'stats') !== false): ?>
          <div class="form-group">
            <label><strong>Stats Items (Numbers with Labels)</strong></label>
            <?php
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
            ?>

            <?php if($isPredefined): ?>
            <small class="form-text text-muted d-block mb-3">Edit existing stats below. You cannot add new stats to this section.</small>
            <?php else: ?>
            <small class="form-text text-muted d-block mb-3">Update existing stats or add new ones.</small>
            <?php endif; ?>

            <?php if(count($stats) > 0): ?>
            <div style="background: #d4edda; padding: 10px; border-radius: 5px; margin-bottom: 15px; border-left: 4px solid #28a745;">
              <small class="text-success"><strong><?php echo e(count($stats)); ?> stat(s) found.</strong></small>
            </div>
            <?php else: ?>
            <div style="background: #fff3cd; padding: 10px; border-radius: 5px; margin-bottom: 15px; border-left: 4px solid #ffc107;">
              <small class="text-warning"><strong>No stats yet.</strong></small>
            </div>
            <?php endif; ?>

            <div id="stats-container">
              <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="stat-item-group" style="background: #f8f9fa; padding: 15px; border-radius: 5px; margin-bottom: 10px; border-left: 3px solid #007bff;">
                <div style="display: flex; gap: 10px; align-items: flex-start;">
                  <div style="flex: 1;">
                    <label style="font-size: 0.85rem; color: #666; margin-bottom: 5px; display: block;">Number</label>
                    <input type="text" name="stats[<?php echo e($index); ?>][number]" class="form-control stat-number" placeholder="e.g., 850" value="<?php echo e($stat['number'] ?? ''); ?>" style="font-weight: 600; font-size: 1.2rem;">
                  </div>
                  <div style="flex: 2;">
                    <label style="font-size: 0.85rem; color: #666; margin-bottom: 5px; display: block;">Label</label>
                    <input type="text" name="stats[<?php echo e($index); ?>][label]" class="form-control stat-label" placeholder="e.g., Projects Completed" value="<?php echo e($stat['label'] ?? ''); ?>">
                  </div>
                  <?php if(!$isPredefined): ?>
                  <div style="padding-top: 24px;">
                    <button type="button" class="btn btn-danger btn-sm remove-stat-btn">Remove</button>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php if(!$isPredefined): ?>
            <button type="button" class="btn btn-sm btn-success" id="add-stat-btn">+ Add Another Stat</button>
            <?php endif; ?>
          </div>
          <?php endif; ?>

          <!-- Button Display Settings for Portfolio Conclusion -->
          <?php if($homeSection->section_name === 'portfolio-conclusion'): ?>
          <hr>
          <div class="form-group">
            <label><strong>Button Display Settings</strong></label>
            <small class="form-text text-muted d-block mb-3">Control which buttons appear on the frontend.</small>

            <div class="form-check mb-3">
              <input type="checkbox" id="portfolio_cta_button_enabled" name="portfolio_cta_button_enabled" class="form-check-input" value="1" <?php if(old('portfolio_cta_button_enabled', $homeSection->portfolio_cta_button_enabled ?? true)): ?> checked <?php endif; ?>>
              <label class="form-check-label" for="portfolio_cta_button_enabled">
                <strong>Enable "Start Conversation" Button</strong>
                <small class="d-block text-muted">Shows the primary CTA button</small>
              </label>
            </div>

            <div class="form-check">
              <input type="checkbox" id="portfolio_more_projects_button_enabled" name="portfolio_more_projects_button_enabled" class="form-check-input" value="1" <?php if(old('portfolio_more_projects_button_enabled', $homeSection->portfolio_more_projects_button_enabled ?? true)): ?> checked <?php endif; ?>>
              <label class="form-check-label" for="portfolio_more_projects_button_enabled">
                <strong>Enable "View All Projects" Button</strong>
                <small class="d-block text-muted">Shows the secondary button linking to all projects</small>
              </label>
            </div>
          </div>
          <?php endif; ?>

          <div class="form-group">
            <label>
              <input type="checkbox" name="is_active" value="1" <?php if(old('is_active', $homeSection->is_active)): ?> checked <?php endif; ?>>
              Active (Show on homepage)
            </label>
          </div>

          <button type="submit" class="btn btn-primary">Update Section</button>
          <a href="<?php echo e(route('admin.home-sections.index')); ?>" class="btn btn-secondary">Cancel</a>
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
  let statsCounter = <?php echo e(count($stats ?? [])); ?>;

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

});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/admin/home-sections/edit.blade.php ENDPATH**/ ?>