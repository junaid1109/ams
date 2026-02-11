<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo $__env->yieldContent('title', (isset($siteName) ? $siteName : config('app.name', 'AMS')) . ' - Professional Business'); ?></title>
  <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Professional Business'); ?>">
  <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords', ''); ?>">

  <!-- Favicons -->
  <link href="<?php echo e(asset('assets/img/favicon.png')); ?>" rel="icon">
  <link href="<?php echo e(asset('assets/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo e(asset('assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/aos/aos.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/glightbox/css/glightbox.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/vendor/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?php echo e(asset('assets/css/main.css')); ?>" rel="stylesheet">

  <?php echo $__env->yieldPushContent('css'); ?>
</head>

<body>

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="<?php echo e(route('home')); ?>" class="logo d-flex align-items-center">
        <h1 class="sitename"><?php echo e(isset($siteName) ? $siteName : config('app.name', 'AMS')); ?></h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?php echo e(route('home')); ?>" class="<?php if(Route::currentRouteName() == 'home'): ?> active <?php endif; ?>">Home</a></li>
          <li><a href="<?php echo e(route('about')); ?>" class="<?php if(Route::currentRouteName() == 'about'): ?> active <?php endif; ?>">About</a></li>
          <li><a href="<?php echo e(route('services.index')); ?>" class="<?php if(str_contains(Route::currentRouteName(), 'services')): ?> active <?php endif; ?>">Services</a></li>
          <li><a href="<?php echo e(route('portfolio.index')); ?>" class="<?php if(str_contains(Route::currentRouteName(), 'portfolio')): ?> active <?php endif; ?>">Portfolio</a></li>
          <li><a href="<?php echo e(route('team')); ?>" class="<?php if(Route::currentRouteName() == 'team'): ?> active <?php endif; ?>">Team</a></li>
          <li><a href="<?php echo e(route('contact.index')); ?>" class="<?php if(Route::currentRouteName() == 'contact.index'): ?> active <?php endif; ?>">Contact</a></li>
          <?php if(auth()->guard()->check()): ?>
            <li class="dropdown"><a href="#"><span>Admin</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                <li><form method="POST" action="<?php echo e(route('logout')); ?>" style="margin:0;"><<?php echo csrf_field(); ?><button type="submit" style="background:none; border:none; color:inherit; cursor:pointer;">Logout</button></form></li>
              </ul>
            </li>
          <?php else: ?>
            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
          <?php endif; ?>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">
    <?php echo $__env->yieldContent('content'); ?>
  </main>

  <footer id="footer" class="footer light-background">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <span><?php echo e(isset($siteName) ? $siteName : config('app.name', 'AMS')); ?></span>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada dirèita venèka trimenda infkleinur.</p>
          <div class="social-links d-flex mt-4">
            <a href="#"><i class="bi bi-twitter-x"></i></a>
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li><a href="<?php echo e(route('about')); ?>">About us</a></li>
            <li><a href="<?php echo e(route('services.index')); ?>">Services</a></li>
            <li><a href="#">Terms of service</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-lg-left">
          <h4>Contact Us</h4>
          <p>
            <strong>Address:</strong> <?php echo e(\App\Helpers\SettingHelper::get('site_address', 'A108 Adam Street, New York, NY 535022')); ?><br>
            <strong>Phone:</strong> <?php echo e(\App\Helpers\SettingHelper::get('site_phone', '+1 5589 55488 55')); ?><br>
            <strong>Email:</strong> <?php echo e(\App\Helpers\SettingHelper::get('site_email', 'info@ams.com')); ?><br>
          </p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span><?php echo e(date('Y')); ?></span> <strong class="px-1"><?php echo e(isset($siteName) ? $siteName : config('app.name', 'AMS')); ?></strong> <span>All Rights Reserved</span></p>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo e(asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/aos/aos.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/glightbox/js/glightbox.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/swiper/swiper-bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/purecounter/purecounter_vanilla.js')); ?>"></script>

  <!-- Main JS File -->
  <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>

  <?php echo $__env->yieldPushContent('js'); ?>

</body>

</html>
<?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/layouts/app.blade.php ENDPATH**/ ?>