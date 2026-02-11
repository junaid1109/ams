

<?php $__env->startSection('title', 'Home Sections - Admin'); ?>
<?php $__env->startSection('page-title', 'Home Page Sections'); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Home Page Sections
        <a href="<?php echo e(route('admin.home-sections.create')); ?>" class="btn btn-primary" style="float: right;">+ Add Section</a>
      </div>
      <div style="overflow-x: auto;">
        <table class="table">
          <thead>
            <tr>
              <th>Section Name</th>
              <th>Title</th>
              <th>Order</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><strong><?php echo e(ucwords(str_replace('-', ' ', $section->section_name))); ?></strong></td>
              <td><?php echo e(substr($section->title, 0, 50)); ?><?php echo e(strlen($section->title) > 50 ? '...' : ''); ?></td>
              <td><?php echo e($section->display_order); ?></td>
              <td>
                <span class="badge <?php if($section->is_active): ?> badge-success <?php else: ?> badge-danger <?php endif; ?>">
                  <?php if($section->is_active): ?> Active <?php else: ?> Inactive <?php endif; ?>
                </span>
              </td>
              <td>
                <a href="<?php echo e(route('admin.home-sections.edit', $section)); ?>" class="btn btn-sm btn-primary">Edit</a>
                <form method="POST" action="<?php echo e(route('admin.home-sections.destroy', $section)); ?>" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>

      <?php if($sections->count() === 0): ?>
      <div style="padding: 20px; text-align: center;">
        <p class="text-muted">No sections found. <a href="<?php echo e(route('admin.home-sections.create')); ?>">Create one</a></p>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/admin/home-sections/index.blade.php ENDPATH**/ ?>