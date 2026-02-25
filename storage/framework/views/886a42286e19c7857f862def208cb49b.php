

<?php $__env->startSection('title', $portfolio->title . ' - ' . (isset($siteName) ? $siteName : 'AMS')); ?>
<?php $__env->startSection('meta_description', $portfolio->description); ?>

<?php $__env->startSection('content'); ?>

<!-- Page Title Section -->
<section class="page-title light-background" style="padding-top: 100px; padding-bottom: 60px;">
  <div class="container">
    <h1><?php echo e($portfolio->title); ?></h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('portfolio.index')); ?>">Portfolio</a></li>
        <li class="breadcrumb-item active"><?php echo e($portfolio->title); ?></li>
      </ol>
    </nav>
  </div>
</section>

<!-- Portfolio Details -->
<section class="portfolio-details section">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-8">
        <?php if($portfolio->image): ?>
        <img src="<?php echo e(asset('storage/' . $portfolio->image)); ?>" class="img-fluid rounded mb-4" alt="<?php echo e($portfolio->title); ?>">
        <?php endif; ?>

        <?php if($portfolio->image_secondary): ?>
        <img src="<?php echo e(asset('storage/' . $portfolio->image_secondary)); ?>" class="img-fluid rounded mb-4" alt="<?php echo e($portfolio->title); ?>">
        <?php endif; ?>

        <h3><?php echo e($portfolio->title); ?></h3>
        <div><?php echo $portfolio->description; ?></div>

        <?php if($portfolio->details): ?>
        <h4 class="mt-4">Project Details</h4>
        <p><?php echo $portfolio->details; ?></p>
        <?php endif; ?>
      </div>

      <div class="col-lg-4">
        <div class="portfolio-info">
          <h3>Project Information</h3>
          <ul>
            <?php if($portfolio->client): ?>
            <li><strong>Client:</strong> <?php echo e($portfolio->client); ?></li>
            <?php endif; ?>
            <?php if($portfolio->category): ?>
            <li><strong>Category:</strong> <?php echo e($portfolio->category); ?></li>
            <?php endif; ?>
            <?php if($portfolio->project_date): ?>
            <li><strong>Project Date:</strong> <?php echo e($portfolio->project_date->format('M d, Y')); ?></li>
            <?php endif; ?>
            <?php if($portfolio->project_url): ?>
            <li><strong>Project URL:</strong> <a href="<?php echo e($portfolio->project_url); ?>" target="_blank">Visit Project</a></li>
            <?php endif; ?>
          </ul>
        </div>

        <?php if($relatedPortfolios->count() > 0): ?>
        <div class="sidebar mt-4">
          <h4 class="sidebar-title">Related Projects</h4>
          <ul class="sidebar-list">
            <?php $__currentLoopData = $relatedPortfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
              <a href="<?php echo e(route('portfolio.show', $related)); ?>"><?php echo e($related->title); ?></a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/frontend/portfolio/show.blade.php ENDPATH**/ ?>