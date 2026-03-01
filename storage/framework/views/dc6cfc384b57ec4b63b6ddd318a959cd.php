

<?php
  $breadcrumbs = [
    ['label' => 'Home', 'url' => route('home')],
    ['label' => $page->title, 'url' => null]
  ];
?>

<?php $__env->startSection('title', $page->title . ' - ' . (isset($siteName) ? $siteName : 'AMS')); ?>
<?php $__env->startSection('meta_description', $page->meta_description); ?>

<?php $__env->startSection('content'); ?>

<!-- Page Title Section -->
<section class="page-title light-background" style="padding-top: 100px; padding-bottom: 60px;">
  <div class="container">
    <h1><?php echo e($page->title); ?></h1>
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

<!-- Page Content -->
<section class="page-content section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <?php if($page->image): ?>
        <img src="<?php echo e(asset('storage/' . $page->image)); ?>" class="img-fluid rounded mb-4" alt="<?php echo e($page->title); ?>">
        <?php endif; ?>

        <div class="content">
          <?php echo $page->content; ?>

        </div>
      </div>

    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/frontend/page.blade.php ENDPATH**/ ?>