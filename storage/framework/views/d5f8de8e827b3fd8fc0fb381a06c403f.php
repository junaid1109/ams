

<?php $__env->startSection('title', 'Features - Admin'); ?>
<?php $__env->startSection('page-title', 'Manage Features'); ?>

<?php $__env->startSection('content'); ?>

<div class="row mb-3">
  <div class="col-md-12">
    <a href="<?php echo e(route('admin.features.create')); ?>" class="btn btn-primary">+ Add New Feature</a>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">Features List</div>
      <div class="table-responsive">
        <table class="table table-hover table-striped mb-0">
          <thead>
            <tr>
              <th>Icon</th>
              <th>Title</th>
              <th>Description</th>
              <th>Order</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td>
                <?php if($feature->icon): ?>
                  <i class="<?php echo e($feature->icon); ?>" style="font-size: 20px;"></i>
                <?php else: ?>
                  <span class="text-muted">-</span>
                <?php endif; ?>
              </td>
              <td><strong><?php echo e($feature->title); ?></strong></td>
              <td><?php echo e(Str::limit($feature->description, 50)); ?></td>
              <td><?php echo e($feature->order); ?></td>
              <td>
                <?php if($feature->published): ?>
                  <span class="badge bg-success">Published</span>
                <?php else: ?>
                  <span class="badge bg-secondary">Draft</span>
                <?php endif; ?>
              </td>
              <td>
                <a href="<?php echo e(route('admin.features.edit', $feature)); ?>" class="btn btn-sm btn-warning">Edit</a>
                <form action="<?php echo e(route('admin.features.destroy', $feature)); ?>" method="POST" style="display:inline;">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
              <td colspan="6" class="text-center text-muted">No features found. <a href="<?php echo e(route('admin.features.create')); ?>">Create one</a></td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <?php echo e($features->links()); ?>

    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/admin/features/index.blade.php ENDPATH**/ ?>