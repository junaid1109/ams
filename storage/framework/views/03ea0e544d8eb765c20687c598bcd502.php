

<?php $__env->startSection('page-title', 'Setup Two-Factor Authentication'); ?>

<?php $__env->startSection('content'); ?>
<div style="padding: 20px; max-width: 600px;">
    <h2>Setup Two-Factor Authentication (2FA)</h2>

    <div style="background: white; padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <div style="background-color: #e7f3ff; padding: 15px; border-radius: 4px; border-left: 4px solid #0dcaf0; margin-bottom: 20px;">
            <h5 style="margin-top: 0; color: #0056b3;">What is 2FA?</h5>
            <p style="margin: 0; color: #0056b3;">
                Two-Factor Authentication adds an extra layer of security to your account. After entering your password, you'll need to enter a code from your authenticator app to log in.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 30px;">
            <!-- Step 1: QR Code -->
            <div>
                <h4 style="margin-top: 0;">Step 1: Scan QR Code</h4>
                <p style="color: #666; margin-bottom: 15px;">Use an authenticator app like Google Authenticator, Microsoft Authenticator, or Authy to scan this QR code:</p>
                
                <img 
                    src="<?php echo e($qrCode); ?>" 
                    alt="QR Code" 
                    style="width: 100%; max-width: 300px; border: 1px solid #ced4da; border-radius: 4px; padding: 10px; background: white;"
                >
            </div>

            <!-- Step 2: Manual Entry -->
            <div>
                <h4 style="margin-top: 0;">Step 2: Manual Entry (if needed)</h4>
                <p style="color: #666; margin-bottom: 15px;">If you can't scan the QR code, enter this code manually in your authenticator app:</p>
                
                <div style="background-color: #f8f9fa; padding: 15px; border-radius: 4px; font-family: monospace; font-size: 14px; word-break: break-all; margin-bottom: 20px;">
                    <strong><?php echo e($secret); ?></strong>
                </div>

                <p style="color: #666; font-size: 12px; margin: 0;">
                    <i class="bi bi-info-circle"></i> Save this secret code in a safe place.
                </p>
            </div>
        </div>

        <!-- Step 3: Verify Code -->
        <div style="background-color: #fff3cd; padding: 15px; border-radius: 4px; border-left: 4px solid #ffc107; margin-bottom: 20px;">
            <h4 style="margin-top: 0; color: #856404;">Step 3: Verify Your Setup</h4>
            <p style="margin: 0 0 15px 0; color: #856404;">Enter the 6-digit code from your authenticator app to complete the setup:</p>

            <form method="POST" action="<?php echo e(route('admin.profile.enable2FA')); ?>" style="margin: 0;">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="secret" value="<?php echo e($secret); ?>">

                <div style="margin-bottom: 15px;">
                    <label for="code" style="display: block; margin-bottom: 8px; font-weight: 500;">Authentication Code <span style="color: #dc3545;">*</span></label>
                    <input 
                        type="text" 
                        id="code" 
                        name="code" 
                        placeholder="000000"
                        maxlength="6"
                        inputmode="numeric"
                        required
                        style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box; font-size: 20px; letter-spacing: 10px; text-align: center; <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-color: #dc3545; <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    >
                    <?php $__errorArgs = ['code'];
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

                <div style="display: flex; gap: 10px;">
                    <button type="submit" class="btn btn-success" style="background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                        <i class="bi bi-check-circle"></i> Verify & Enable 2FA
                    </button>
                    <a href="<?php echo e(route('admin.profile.show')); ?>" class="btn btn-secondary" style="background-color: #6c757d; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block;">
                        Cancel
                    </a>
                </div>
            </form>
        </div>

        <div style="background-color: #f8d7da; padding: 15px; border-radius: 4px; border-left: 4px solid #dc3545;">
            <h5 style="margin-top: 0; color: #721c24;">Important</h5>
            <ul style="margin: 10px 0 0 0; color: #721c24; padding-left: 20px;">
                <li>Save your backup codes in a safe place. You can use them if you lose access to your phone.</li>
                <li>Never share your secret code or QR code with anyone.</li>
                <li>Make sure your device time is synchronized for the authenticator to work.</li>
            </ul>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/admin/profile/setup-2fa.blade.php ENDPATH**/ ?>