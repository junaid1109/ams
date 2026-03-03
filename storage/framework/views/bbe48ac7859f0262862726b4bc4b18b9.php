

<?php
  $currentMenu = \App\Models\Menu::getCurrentPageMenu();
  $pageTitle = $currentMenu?->label ?? 'Contact';
  $breadcrumbs = \App\Models\Menu::getBreadcrumbs();
?>

<?php $__env->startSection('title', (isset($siteName) ? $siteName : 'AMS') . ' - ' . $pageTitle); ?>

<style>
  /* Contact Form Styling */
  .contact-form .form-control {
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    padding: 12px 16px;
    font-size: 14px;
    transition: all 0.3s ease;
    background-color: #fafafa;
    color: #333;
  }

  .contact-form .form-control:focus {
    border-color: var(--accent-color, #0066cc);
    background-color: #fff;
    box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
    outline: none;
  }

  .contact-form .form-control::placeholder {
    color: #999;
    font-weight: 400;
  }

  .contact-form .form-control.is-invalid {
    border-color: #dc3545;
    background-color: #fff5f5;
  }

  .contact-form .form-control.is-invalid:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1);
  }

  .contact-form textarea.form-control {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    resize: vertical;
    min-height: 140px;
  }

  .contact-form .invalid-feedback {
    color: #dc3545;
    font-size: 12px;
    margin-top: 5px;
    display: block;
  }

  .contact-form .btn-primary {
    background-color: var(--accent-color, #0066cc);
    border: 2px solid var(--accent-color, #0066cc);
    color: #fff;
    padding: 12px 40px;
    font-size: 16px;
    font-weight: 600;
    border-radius: 8px;
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .contact-form .btn-primary:hover {
    background-color: #0052a3;
    border-color: #0052a3;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0, 102, 204, 0.3);
  }

  .contact-form .btn-primary:active {
    transform: translateY(0);
  }

  .contact .info-item {
    padding: 20px;
    background: linear-gradient(135deg, #f5f7fa 0%, #fff 100%);
    border-radius: 8px;
    border-left: 4px solid var(--accent-color, #0066cc);
    margin-bottom: 25px;
    transition: all 0.3s ease;
  }

  .contact .info-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  }

  .contact .info-item h4 {
    color: var(--heading-color, #1a1a1a);
    font-weight: 600;
    margin-bottom: 10px;
    font-size: 18px;
  }

  .contact .info-item p {
    color: #666;
    margin: 0;
    line-height: 1.6;
  }
</style>

<?php $__env->startSection('content'); ?>

<!-- Page Title Section -->
<section class="page-title light-background" style="padding-top: 100px; padding-bottom: 60px;">
  <div class="container">
    <h1><?php echo e($pageTitle); ?></h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($breadcrumb['url']): ?>
          <li class="breadcrumb-item"><a href="<?php echo e($breadcrumb['url']); ?>"><?php echo e($breadcrumb['label']); ?></a></li>
          <?php else: ?>
          <li class="breadcrumb-item active"><?php echo e($breadcrumb['label']); ?></li>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ol>
    </nav>
  </div>
</section>

<!-- Contact Section -->
<section class="contact section">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-4">
        <div class="info-item d-flex flex-column">
          <h4>Address</h4>
          <p><?php echo e(\App\Helpers\SettingHelper::get('site_address', 'A108 Adam Street, New York, NY 535022, United States')); ?></p>
        </div>

        <div class="info-item d-flex flex-column">
          <h4>Call Us</h4>
          <p><?php echo e(\App\Helpers\SettingHelper::get('site_phone', '+1 5589 55488 55')); ?></p>
        </div>

        <div class="info-item d-flex flex-column">
          <h4>Fax Us</h4>
          <p><?php echo e(\App\Helpers\SettingHelper::get('site_fax', '+1 5589 55488 55')); ?></p>
        </div>

        <div class="info-item d-flex flex-column">
          <h4>Email Us</h4>
          <p><?php echo e(\App\Helpers\SettingHelper::get('site_email', 'info@ams.com')); ?></p>
        </div>
      </div>

      <div class="col-lg-8">
        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
          <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
        <?php endif; ?>

        <?php if(session('success')): ?>
        <div class="alert alert-success">
          <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('contact.store')); ?>" class="contact-form">
          <?php echo csrf_field(); ?>
          <div class="row gy-4">
            <div class="col-md-6">
              <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Your Name" value="<?php echo e(old('name')); ?>">
              <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-md-6">
              <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" placeholder="Your Email" value="<?php echo e(old('email')); ?>">
              <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone" placeholder="Phone" value="<?php echo e(old('phone')); ?>">
              <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="subject" placeholder="Subject" value="<?php echo e(old('subject')); ?>">
              <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-md-12">
              <textarea class="form-control <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="message" rows="6" placeholder="Message"><?php echo e(old('message')); ?></textarea>
              <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Send Message</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/frontend/contact.blade.php ENDPATH**/ ?>