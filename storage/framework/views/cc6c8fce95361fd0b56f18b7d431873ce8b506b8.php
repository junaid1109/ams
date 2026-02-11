

<?php $__env->startSection('title', 'Portfolio - Admin'); ?>
<?php $__env->startSection('page-title', 'Portfolio Management'); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Portfolio Items
        <a href="<?php echo e(route('admin.portfolio.create')); ?>" class="btn btn-primary" style="float: right;">+ Add Portfolio Item</a>
      </div>
      <div style="overflow-x: auto;">
        <table class="table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Category</th>
              <th>Client</th>
              <th>Date</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($portfolio->title); ?></td>
              <td><?php echo e($portfolio->category); ?></td>
              <td><?php echo e($portfolio->client); ?></td>
              <td><?php echo e($portfolio->project_date ? $portfolio->project_date->format('M d, Y') : 'N/A'); ?></td>
              <td>
                <span class="badge <?php if($portfolio->published): ?> badge-success <?php else: ?> badge-danger <?php endif; ?>">
                  <?php if($portfolio->published): ?> Published <?php else: ?> Draft <?php endif; ?>
                </span>
              </td>
              <td>
                <a href="<?php echo e(route('admin.portfolio.edit', $portfolio)); ?>" class="btn btn-sm btn-primary">Edit</a>
                <form method="POST" action="<?php echo e(route('admin.portfolio.destroy', $portfolio)); ?>" style="display:inline;" onsubmit="return confirm('Are you sure?');">
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
        <?php echo e($portfolios->links()); ?>

      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/admin/portfolio/index.blade.php ENDPATH**/ ?>