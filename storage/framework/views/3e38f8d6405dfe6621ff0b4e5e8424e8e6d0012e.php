

<?php $__env->startSection('title', 'Team - Admin'); ?>
<?php $__env->startSection('page-title', 'Team Members Management'); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Team Members
        <a href="<?php echo e(route('admin.team.create')); ?>" class="btn btn-primary" style="float: right;">+ Add Team Member</a>
      </div>
      <div style="overflow-x: auto;">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Position</th>
              <th>Email</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $teamMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($member->name); ?></td>
              <td><?php echo e($member->position); ?></td>
              <td><?php echo e($member->email); ?></td>
              <td>
                <span class="badge <?php if($member->published): ?> badge-success <?php else: ?> badge-danger <?php endif; ?>">
                  <?php if($member->published): ?> Published <?php else: ?> Hidden <?php endif; ?>
                </span>
              </td>
              <td>
                <a href="<?php echo e(route('admin.team.edit', $member)); ?>" class="btn btn-sm btn-primary">Edit</a>
                <form method="POST" action="<?php echo e(route('admin.team.destroy', $member)); ?>" style="display:inline;" onsubmit="return confirm('Are you sure?');">
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
        <?php echo e($teamMembers->links()); ?>

      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/admin/team/index.blade.php ENDPATH**/ ?>