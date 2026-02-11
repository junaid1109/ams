

<?php $__env->startSection('title', 'Pages - Admin'); ?>
<?php $__env->startSection('page-title', 'Pages Management'); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Pages
        <a href="<?php echo e(route('admin.pages.create')); ?>" class="btn btn-primary" style="float: right;">+ Add Page</a>
      </div>
      <div style="overflow-x: auto;">
        <table class="table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Slug</th>
              <th>Type</th>
              <th>Status</th>
              <th>Modified</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($page->title); ?></td>
              <td><?php echo e($page->slug); ?></td>
              <td><?php echo e($page->page_type); ?></td>
              <td>
                <span class="badge <?php if($page->published): ?> badge-success <?php else: ?> badge-danger <?php endif; ?>">
                  <?php if($page->published): ?> Published <?php else: ?> Draft <?php endif; ?>
                </span>
              </td>
              <td><?php echo e($page->updated_at->format('M d, Y')); ?></td>
              <td>
                <a href="<?php echo e(route('admin.pages.edit', $page)); ?>" class="btn btn-sm btn-primary">Edit</a>
                <form method="POST" action="<?php echo e(route('admin.pages.destroy', $page)); ?>" style="display:inline;" onsubmit="return confirm('Are you sure?');">
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
        <?php echo e($pages->links()); ?>

      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/admin/pages/index.blade.php ENDPATH**/ ?>