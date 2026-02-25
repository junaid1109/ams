

<?php $__env->startSection('title', $service->title . ' - ' . (isset($siteName) ? $siteName : 'AMS')); ?>
<?php $__env->startSection('meta_description', $service->short_description); ?>

<?php $__env->startSection('content'); ?>

<!-- Page Title Section -->
<section class="page-title light-background" style="padding-top: 100px; padding-bottom: 60px;">
  <div class="container">
    <h1><?php echo e($service->title); ?></h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('services.index')); ?>">Services</a></li>
        <li class="breadcrumb-item active"><?php echo e($service->title); ?></li>
      </ol>
    </nav>
  </div>
</section>

<!-- Service Details Section -->
<section class="service-details section">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-10">
        <?php if($service->image): ?>
        <img src="<?php echo e(asset('storage/' . $service->image)); ?>" class="img-fluid rounded mb-4" alt="<?php echo e($service->title); ?>">
        <?php endif; ?>

        <h3><?php echo e($service->title); ?></h3>
        <div><?php echo $service->description; ?></div>

        <?php if($service->features): ?>
        <h4 class="mt-4">Key Features</h4>
        <p><?php echo $service->features; ?></p>
        <?php endif; ?>

        <?php if($service->pricing): ?>
        <h4 class="mt-4">Pricing</h4>
        <p><?php echo $service->pricing; ?></p>
        <?php endif; ?>
      </div>

     
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/frontend/services/show.blade.php ENDPATH**/ ?>