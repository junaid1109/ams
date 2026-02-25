

<?php $__env->startSection('title', 'Create Service - Admin'); ?>
<?php $__env->startSection('page-title', 'Create Service'); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Create New Service</div>
      <div class="card-body" style="padding: 20px;">
        <form id="serviceForm" method="POST" action="<?php echo e(route('admin.services.store')); ?>" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>

          <div class="form-group">
            <label>Title *</label>
            <input type="text" name="title" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('title')); ?>" required>
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
            <label>Short Description *</label>
            <textarea name="short_description" class="form-control <?php $__errorArgs = ['short_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="3" required><?php echo e(old('short_description')); ?></textarea>
            <?php $__errorArgs = ['short_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
            <label>Description *</label>
            <textarea id="description-editor" name="description" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="6"><?php echo e(old('description')); ?></textarea>
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
            <label>Icon Class (Bootstrap Icons)</label>
            <div style="display: flex; gap: 10px;">
              <select name="icon" id="icon-select" class="form-control <?php $__errorArgs = ['icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" style="flex: 1;">
                <option value="">-- Select Icon --</option>
                <?php $__empty_1 = true; $__currentLoopData = $icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <option value="<?php echo e($icon['class']); ?>" <?php if(old('icon') === $icon['class']): ?> selected <?php endif; ?>>
                  <?php echo e($icon['emoji']); ?> <?php echo e($icon['name']); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <option disabled>No icons available</option>
                <?php endif; ?>
              </select>
              <div id="icon-preview" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border: 1px solid #ddd; border-radius: 4px; flex-shrink: 0;">
                <?php if(old('icon')): ?>
                  <i class="<?php echo e(old('icon')); ?>" style="font-size: 24px;"></i>
                <?php else: ?>
                  <small style="color: #999;">Preview</small>
                <?php endif; ?>
              </div>
            </div>
            <?php $__errorArgs = ['icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback d-block"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
            <input type="file" name="image" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept="image/*">
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
            <label>Features (HTML)</label>
            <textarea id="features-editor" name="features" class="form-control <?php $__errorArgs = ['features'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="4"><?php echo e(old('features')); ?></textarea>
            <?php $__errorArgs = ['features'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
            <label>Pricing (HTML)</label>
            <textarea id="pricing-editor" name="pricing" class="form-control <?php $__errorArgs = ['pricing'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="4"><?php echo e(old('pricing')); ?></textarea>
            <?php $__errorArgs = ['pricing'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
            <label>Order</label>
            <input type="number" name="order" class="form-control <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('order', 0)); ?>">
            <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-group">
            <label>
              <input type="checkbox" name="published" value="1" <?php if(old('published', true)): ?> checked <?php endif; ?>>
              Published
            </label>
          </div>

          <button type="submit" class="btn btn-primary">Create Service</button>
          <a href="<?php echo e(route('admin.services.index')); ?>" class="btn btn-secondary">Cancel</a>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/admin/services/create.blade.php ENDPATH**/ ?>