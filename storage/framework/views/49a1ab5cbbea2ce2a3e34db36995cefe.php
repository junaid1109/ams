

<?php $__env->startSection('page-title', 'Change Password'); ?>

<?php $__env->startSection('content'); ?>
<div style="padding: 20px; max-width: 600px;">
    <h2>Change Password</h2>

    <form action="<?php echo e(route('admin.profile.updatePassword')); ?>" method="POST" style="background: white; padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <?php echo csrf_field(); ?>

        <div style="margin-bottom: 20px;">
            <label for="current_password" style="display: block; margin-bottom: 8px; font-weight: 500;">Current Password <span style="color: #dc3545;">*</span></label>
            <input 
                type="password" 
                id="current_password" 
                name="current_password" 
                required
                style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box; <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-color: #dc3545; <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            >
            <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span style="color: #dc3545; font-size: 12px;"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="password" style="display: block; margin-bottom: 8px; font-weight: 500;">New Password <span style="color: #dc3545;">*</span></label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                required
                style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box; <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-color: #dc3545; <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            >
            <small style="color: #6c757d;">Minimum 8 characters</small>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span style="color: #dc3545; font-size: 12px;"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="password_confirmation" style="display: block; margin-bottom: 8px; font-weight: 500;">Confirm New Password <span style="color: #dc3545;">*</span></label>
            <input 
                type="password" 
                id="password_confirmation" 
                name="password_confirmation" 
                required
                style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;"
            >
        </div>

        <div style="background-color: #e7f3ff; padding: 15px; border-radius: 4px; border-left: 4px solid #0dcaf0; margin-bottom: 20px;">
            <h5 style="margin-top: 0; margin-bottom: 10px; color: #0056b3;">Password Requirements</h5>
            <ul style="margin: 0; padding-left: 20px; color: #0056b3;">
                <li>Minimum 8 characters</li>
                <li>Mix of uppercase and lowercase letters</li>
                <li>Include numbers and special characters</li>
            </ul>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                <i class="bi bi-check-circle"></i> Update Password
            </button>
            <a href="<?php echo e(route('admin.profile.show')); ?>" class="btn btn-secondary" style="background-color: #6c757d; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block;">
                Cancel
            </a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/admin/profile/edit-password.blade.php ENDPATH**/ ?>