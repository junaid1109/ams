

<?php
  $currentMenu = \App\Models\Menu::getCurrentPageMenu();
  $pageTitle = $currentMenu?->label ?? 'Services';
  $breadcrumbs = \App\Models\Menu::getBreadcrumbs();
?>

<?php $__env->startSection('title', (isset($siteName) ? $siteName : 'AMS') . ' - ' . $pageTitle); ?>

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

<!-- Services Section -->
<section class="services section">
  <div class="container">
    <div class="row gy-4">
      <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-lg-4 col-md-6">
        <div class="service-item position-relative">
          <?php if($service->icon): ?>
          <div class="icon">
            <i class="<?php echo e($service->icon); ?>"></i>
          </div>
          <?php endif; ?>
          <?php if($service->image): ?>
          <div class="service-image">
            <img src="<?php echo e(asset('storage/' . $service->image)); ?>" class="img-fluid" alt="<?php echo e($service->title); ?>">
          </div>
          <?php endif; ?>
          <h3><a href="<?php echo e(route('services.show', $service)); ?>" class="stretched-link"><?php echo e($service->title); ?></a></h3>
          <p><?php echo e($service->short_description); ?></p>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/frontend/services/index.blade.php ENDPATH**/ ?>