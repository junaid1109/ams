

<?php
  $portfolioMenu = \App\Models\Menu::where('route_name', 'portfolio.index')->first();
  $breadcrumbs = [
    ['label' => 'Home', 'url' => route('home')],
    ['label' => $portfolioMenu?->label ?? 'Portfolio', 'url' => route('portfolio.index')],
    ['label' => $service->title, 'url' => null]
  ];
?>

<?php $__env->startSection('title', $service->title . ' - ' . (isset($siteName) ? $siteName : 'AMS')); ?>
<?php $__env->startSection('meta_description', $service->short_description); ?>

<?php $__env->startSection('content'); ?>

<!-- Page Title Section -->
<section class="page-title light-background" style="padding-top: 100px; padding-bottom: 60px;">
  <div class="container">
    <h1><?php echo e($service->title); ?></h1>
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

<!-- Service Details Section -->
<section class="service-details section">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-10">
        <?php if($service->image): ?>
        <img src="<?php echo e(asset('storage/' . $service->image)); ?>" class="img-fluid rounded mb-4" alt="<?php echo e($service->title); ?>">
        <?php endif; ?>

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