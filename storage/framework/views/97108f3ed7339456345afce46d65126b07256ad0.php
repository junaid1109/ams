

<?php $__env->startSection('title', 'Services - Admin'); ?>
<?php $__env->startSection('page-title', 'Services Management'); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Services
        <a href="<?php echo e(route('admin.services.create')); ?>" class="btn btn-primary" style="float: right;">+ Add Service</a>
      </div>
      <div style="overflow-x: auto;">
        <table class="table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Short Description</th>
              <th>Order</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($service->title); ?></td>
              <td><?php echo e(substr($service->short_description, 0, 50)); ?>...</td>
              <td><?php echo e($service->order); ?></td>
              <td>
                <span class="badge <?php if($service->published): ?> badge-success <?php else: ?> badge-danger <?php endif; ?>">
                  <?php if($service->published): ?> Published <?php else: ?> Draft <?php endif; ?>
                </span>
              </td>
              <td>
                <a href="<?php echo e(route('admin.services.edit', $service)); ?>" class="btn btn-sm btn-primary">Edit</a>
                <form method="POST" action="<?php echo e(route('admin.services.destroy', $service)); ?>" style="display:inline;" onsubmit="return confirm('Are you sure?');">
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

      <!-- Pagination -->
      <div style="padding: 20px;">
        <?php echo e($services->links()); ?>

      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/admin/services/index.blade.php ENDPATH**/ ?>