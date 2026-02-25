

<?php $__env->startSection('title', $page->title . ' - ' . (isset($siteName) ? $siteName : 'AMS')); ?>
<?php $__env->startSection('meta_description', $page->meta_description); ?>

<?php $__env->startSection('content'); ?>

<!-- Page Title Section -->
<section class="page-title light-background" style="padding-top: 100px; padding-bottom: 60px;">
  <div class="container">
    <h1><?php echo e($page->title); ?></h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
        <li class="breadcrumb-item active"><?php echo e($page->title); ?></li>
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

      <div class="col-lg-4">
        <div class="sidebar">
          <h4>Quick Links</h4>
          <ul class="sidebar-list">
            <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li><a href="<?php echo e(route('about')); ?>">About Us</a></li>
            <li><a href="<?php echo e(route('services.index')); ?>">Services</a></li>
            <li><a href="<?php echo e(route('portfolio.index')); ?>">Portfolio</a></li>
            <li><a href="<?php echo e(route('team')); ?>">Team</a></li>
            <li><a href="<?php echo e(route('contact.index')); ?>">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/frontend/page.blade.php ENDPATH**/ ?>