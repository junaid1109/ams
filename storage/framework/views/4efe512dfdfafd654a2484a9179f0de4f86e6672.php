

<?php $__env->startSection('title', (isset($siteName) ? $siteName : 'AMS') . ' - Team'); ?>

<?php $__env->startSection('content'); ?>

<!-- Page Title Section -->
<section class="page-title light-background" style="padding-top: 100px; padding-bottom: 60px;">
  <div class="container">
    <h1>Our Team</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
        <li class="breadcrumb-item active">Team</li>
      </ol>
    </nav>
  </div>
</section>

<!-- Team Section -->
<section class="team section light-background">
  <div class="container">
    <div class="row gy-4">
      <?php $__currentLoopData = $teamMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="team-member">
          <?php if($member->image): ?>
          <div class="member-img">
            <img src="<?php echo e(asset('storage/' . $member->image)); ?>" class="img-fluid" alt="<?php echo e($member->name); ?>">
          </div>
          <?php endif; ?>
          <div class="member-info">
            <h4><?php echo e($member->name); ?></h4>
            <span><?php echo e($member->position); ?></span>
            <p><?php echo e($member->bio); ?></p>
            <div class="social">
              <?php if($member->twitter): ?><a href="<?php echo e($member->twitter); ?>"><i class="bi bi-twitter-x"></i></a><?php endif; ?>
              <?php if($member->facebook): ?><a href="<?php echo e($member->facebook); ?>"><i class="bi bi-facebook"></i></a><?php endif; ?>
              <?php if($member->instagram): ?><a href="<?php echo e($member->instagram); ?>"><i class="bi bi-instagram"></i></a><?php endif; ?>
              <?php if($member->linkedin): ?><a href="<?php echo e($member->linkedin); ?>"><i class="bi bi-linkedin"></i></a><?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/frontend/team.blade.php ENDPATH**/ ?>