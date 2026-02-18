

<?php $__env->startSection('title', 'Contacts - Admin'); ?>
<?php $__env->startSection('page-title', 'Contact Messages'); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">Contact Messages</div>
      <div style="overflow-x: auto;">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Subject</th>
              <th>Date</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr style="<?php if(!$contact->is_read): ?> background-color: #f0f8ff; <?php endif; ?>">
              <td><?php echo e($contact->name); ?></td>
              <td><?php echo e($contact->email); ?></td>
              <td><?php echo e($contact->subject); ?></td>
              <td><?php echo e($contact->created_at->format('M d, Y H:i')); ?></td>
              <td>
                <span class="badge <?php if($contact->is_read): ?> badge-success <?php else: ?> badge-warning <?php endif; ?>">
                  <?php if($contact->is_read): ?> Read <?php else: ?> Unread <?php endif; ?>
                </span>
              </td>
              <td>
                <a href="<?php echo e(route('admin.contacts.show', $contact)); ?>" class="btn btn-sm btn-primary">View</a>
                <form method="POST" action="<?php echo e(route('admin.contacts.destroy', $contact)); ?>" style="display:inline;" onsubmit="return confirm('Are you sure?');">
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
        <?php echo e($contacts->links()); ?>

      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/admin/contacts/index.blade.php ENDPATH**/ ?>