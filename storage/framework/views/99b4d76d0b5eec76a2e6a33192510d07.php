

<?php
  $currentMenu = \App\Models\Menu::getCurrentPageMenu();
  $pageTitle = $currentMenu?->label ?? 'About';
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

<!-- About Section -->
<section class="about section">
  <div class="container">
    <?php if($page): ?>
    <div class="row gy-4">
      <?php if($page->image): ?>
      <div class="col-lg-6">
        <img src="<?php echo e(asset('storage/' . $page->image)); ?>" class="img-fluid rounded" alt="About Image">
      </div>
      <?php endif; ?>
      <div class="col-lg-6 content">
        <h2><?php echo e($page->title); ?></h2>
        <?php echo $page->content; ?>

      </div>
    </div>
    <?php endif; ?>
  </div>
</section>

<?php
  // Helper function for home sections
  $getSection = function($name) use ($homeSections) {
    if ($homeSections) {
      return $homeSections->firstWhere('section_name', $name);
    }
    return null;
  };
  $aboutHomeSection = $getSection('about');
?>

<?php if($aboutHomeSection && $aboutHomeSection->content): ?>
<!-- About Stats Section from Home Sections -->
<section class="about-stats section light-background">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2><?php echo e($aboutHomeSection->title ?? 'About Us'); ?></h2>
    </div>
    <div class="stats-row" style="display: flex; justify-content: center; gap: 40px; flex-wrap: wrap;">
      <?php
        $stats = $aboutHomeSection->content ?? [];
        if (!is_array($stats)) {
          $stats = json_decode($stats, true) ?? [];
        }
      ?>
       <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="stat-item">
                  <?php
                      $rawNumber = $stat['number'] ?? '0';
                      preg_match('/[\d.]+/', $rawNumber, $matches);
                      $numericValue = $matches[0] ?? 0;
                      $suffix = preg_replace('/[\d.]+/', '', $rawNumber);
                  ?>
                  <div class="stat-number" style="font-size: 2rem; font-weight: bold; color: #313131;">
                      <span class="purecounter" 
                            data-purecounter-start="0" 
                            data-purecounter-end="<?php echo e($numericValue); ?>" 
                            data-purecounter-duration="1">0</span><?php echo e($suffix); ?>

                  </div>
                  <div class="stat-label"><?php echo e($stat['label'] ?? 'Statistic'); ?></div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Team Section -->
<section class="team section light-background">
  <div class="container">
    <div class="section-title">
      <h2>Our Team</h2>
      <p>Meet our professional team</p>
    </div>

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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/frontend/about.blade.php ENDPATH**/ ?>