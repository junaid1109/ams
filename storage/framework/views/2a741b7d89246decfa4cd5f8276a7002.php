

<?php $__env->startSection('title', 'Edit Feature - Admin'); ?>
<?php $__env->startSection('page-title', 'Edit Feature'); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Edit Feature</div>
      <div class="card-body" style="padding: 20px;">
        <form method="POST" action="<?php echo e(route('admin.features.update', $feature)); ?>">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>

          <div class="form-group">
            <label>Title *</label>
            <input type="text" name="title" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('title', $feature->title)); ?>" required>
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
            <label>Description *</label>
            <textarea name="description" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="4" required><?php echo e(old('description', $feature->description)); ?></textarea>
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
                <option value="<?php echo e($icon['class']); ?>" <?php if(old('icon', $feature->icon) === $icon['class']): ?> selected <?php endif; ?>>
                  <?php echo e($icon['emoji']); ?> <?php echo e($icon['name']); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <option disabled>No icons available</option>
                <?php endif; ?>
              </select>
              <div id="icon-preview" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border: 1px solid #ddd; border-radius: 4px; flex-shrink: 0;">
                <?php if(old('icon', $feature->icon)): ?>
                  <i class="<?php echo e(old('icon', $feature->icon)); ?>" style="font-size: 24px;"></i>
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
            <label>Order</label>
            <input type="number" name="order" class="form-control <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('order', $feature->order)); ?>">
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
              <input type="checkbox" name="published" value="1" <?php if(old('published', $feature->published)): ?> checked <?php endif; ?>>
              Published
            </label>
          </div>

          <button type="submit" class="btn btn-primary">Update Feature</button>
          <a href="<?php echo e(route('admin.features.index')); ?>" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/admin/features/edit.blade.php ENDPATH**/ ?>