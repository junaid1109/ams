

<?php $__env->startSection('title', (isset($siteName) ? $siteName : 'AMS') . ' - Portfolio'); ?>

<?php $__env->startSection('content'); ?>

<!-- Page Title Section -->
<section class="page-title light-background" style="padding-top: 100px; padding-bottom: 60px;">
  <div class="container">
    <h1>Portfolio</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
        <li class="breadcrumb-item active">Portfolio</li>
      </ol>
    </nav>
  </div>
</section>

<!-- Portfolio Section -->
<section class="portfolio section">
  <div class="container">
    <div class="portfolio-filters">
      <button class="portfolio-filter active" data-filter="*">All</button>
      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <button class="portfolio-filter" data-filter=".filter-<?php echo e($category->category); ?>"><?php echo e($category->category); ?></button>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="row gy-4 isotope-container">
      <?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-<?php echo e($portfolio->category); ?>">
        <?php if($portfolio->image): ?>
        <img src="<?php echo e(asset('storage/' . $portfolio->image)); ?>" class="img-fluid" alt="<?php echo e($portfolio->title); ?>">
        <?php endif; ?>
        <div class="portfolio-info">
          <h4><a href="<?php echo e(route('portfolio.show', $portfolio)); ?>" title="More Details"><?php echo e($portfolio->title); ?></a></h4>
          <p><?php echo e($portfolio->category); ?></p>
          <?php if($portfolio->image): ?>
          <a href="<?php echo e(asset('storage/' . $portfolio->image)); ?>" title="<?php echo e($portfolio->title); ?>" data-gallery="portfolio-gallery" class="glightbox preview-link">
            <i class="bi bi-zoom-in"></i>
          </a>
          <?php endif; ?>
          <a href="<?php echo e(route('portfolio.show', $portfolio)); ?>" title="More Details" class="details-link">
            <i class="bi bi-link-45deg"></i>
          </a>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script>
  document.querySelectorAll('.portfolio-filter').forEach(button => {
    button.addEventListener('click', function() {
      document.querySelectorAll('.portfolio-filter').forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      
      const filterValue = this.getAttribute('data-filter');
      document.querySelectorAll('.portfolio-item').forEach(item => {
        if (filterValue === '*' || item.className.includes(filterValue.substring(1))) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/frontend/portfolio/index.blade.php ENDPATH**/ ?>