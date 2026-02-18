

<?php $__env->startSection('page-title', 'Manage Admin Users'); ?>

<?php $__env->startSection('content'); ?>
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Admin Users</h2>
        <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-primary" style="background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
            <i class="bi bi-plus-circle"></i> Add New Admin
        </a>
    </div>

    <?php if($errors->any()): ?>
    <div class="alert alert-danger" style="padding: 15px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px; margin-bottom: 20px;">
        <h4>Please fix the following errors:</h4>
        <ul style="margin: 10px 0 0 0;">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <table style="width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <thead>
            <tr style="background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                <th style="padding: 15px; text-align: left; border-right: 1px solid #dee2e6;">Name</th>
                <th style="padding: 15px; text-align: left; border-right: 1px solid #dee2e6;">Email</th>
                <th style="padding: 15px; text-align: left; border-right: 1px solid #dee2e6;">Role</th>
                <th style="padding: 15px; text-align: left; border-right: 1px solid #dee2e6;">2FA</th>
                <th style="padding: 15px; text-align: left; border-right: 1px solid #dee2e6;">Status</th>
                <th style="padding: 15px; text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr style="border-bottom: 1px solid #dee2e6;">
                <td style="padding: 15px; border-right: 1px solid #dee2e6;"><?php echo e($user->name); ?></td>
                <td style="padding: 15px; border-right: 1px solid #dee2e6;"><?php echo e($user->email); ?></td>
                <td style="padding: 15px; border-right: 1px solid #dee2e6;">
                    <span style="background-color: #e2e3e5; padding: 5px 10px; border-radius: 3px; font-size: 12px; text-transform: uppercase;">
                        <?php echo e(ucfirst($user->role)); ?>

                    </span>
                </td>
                <td style="padding: 15px; border-right: 1px solid #dee2e6;">
                    <?php if($user->isTwoFactorEnabled()): ?>
                    <span style="background-color: #d4edda; color: #155724; padding: 5px 10px; border-radius: 3px; font-size: 12px;">
                        <i class="bi bi-check-circle"></i> Enabled
                    </span>
                    <?php else: ?>
                    <span style="background-color: #f8d7da; color: #721c24; padding: 5px 10px; border-radius: 3px; font-size: 12px;">
                        <i class="bi bi-x-circle"></i> Disabled
                    </span>
                    <?php endif; ?>
                </td>
                <td style="padding: 15px; border-right: 1px solid #dee2e6;">
                    <?php if($user->is_active): ?>
                    <span style="background-color: #d4edda; color: #155724; padding: 5px 10px; border-radius: 3px; font-size: 12px;">
                        Active
                    </span>
                    <?php else: ?>
                    <span style="background-color: #f8d7da; color: #721c24; padding: 5px 10px; border-radius: 3px; font-size: 12px;">
                        Inactive
                    </span>
                    <?php endif; ?>
                </td>
                <td style="padding: 15px; text-align: center;">
                    <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="btn btn-sm" style="background-color: #28a745; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; margin-right: 5px; display: inline-block;">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form method="POST" action="<?php echo e(route('admin.users.destroy', $user)); ?>" style="display: inline-block;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-sm" style="background-color: #dc3545; color: white; padding: 5px 10px; border: none; border-radius: 3px; cursor: pointer;" onclick="return confirm('Are you sure?')">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="6" style="padding: 20px; text-align: center; color: #999;">No admin users found.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        <?php echo e($users->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/admin/users/index.blade.php ENDPATH**/ ?>