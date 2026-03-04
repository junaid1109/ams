<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo $__env->yieldContent('title', (isset($siteName) ? $siteName : config('app.name', 'AMS')) . ' - Professional Business'); ?></title>
  <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Professional Business'); ?>">
  <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords', ''); ?>">

  <!-- Favicons -->
  <?php
    $favicon = \App\Helpers\SettingHelper::get('site_favicon');
  ?>
  <?php if($favicon): ?>
  <link href="<?php echo e(asset('storage/' . $favicon)); ?>" rel="icon">
  <?php else: ?>
  <link href="<?php echo e(asset('assets/img/favicon.png')); ?>" rel="icon">
  <?php endif; ?>
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

  <!-- Standardized Image Sizing -->
  <style>
    /* Services Section - Listing Images */
    .service-image {
      height: 300px;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 15px;
    }

    .service-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
    }

    /* Services Detail Page Image */
    .service-details .col-lg-10 > img {
      width: 100%;
      height: 400px;
      object-fit: cover;
      object-position: center;
    }

    /* Portfolio Listing Images */
    .portfolio-item {
      position: relative;
      overflow: visible;
      background: white;
      display: flex;
      flex-direction: column;
    }

    .portfolio-item > img {
      width: 100%;
      height: 350px;
      object-fit: cover;
      object-position: center;
      display: block;
      flex-shrink: 0;
    }

    .portfolio-item .portfolio-info {
      padding: 15px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .portfolio-item .portfolio-info h4 {
      margin-bottom: 8px;
    }

    .portfolio-item .portfolio-info p {
      margin-bottom: 10px;
    }

    .portfolio-item .portfolio-info a {
      margin-right: 10px;
    }

    /* Portfolio Detail Page Images */
    .portfolio-details .col-lg-8 > img {
      width: 100%;
      height: 400px;
      object-fit: cover;
      object-position: center;
    }

    /* Team Member Images */
    .member-img {
      height: 280px;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 15px;
    }

    .member-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
    }

    /* Hero Section Image */
    .hero img {
      width: 100%;
      height: auto;
      max-height: 500px;
      object-fit: cover;
      object-position: center;
    }

    /* Footer Contact Strong Tags Gap */
    .footer-contact strong {
      margin-right: 8px;
      display: inline-block;
    }
    .footer-contact p {
      line-height: 2.2;
    }  </style>

  <?php echo $__env->yieldPushContent('css'); ?>
</head>

<body>

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="<?php echo e(route('home')); ?>" class="logo d-flex align-items-center">
        <?php
          $logo = \App\Helpers\SettingHelper::get('site_logo');
        ?>
        <?php if($logo): ?>
        <img src="<?php echo e(asset('storage/' . $logo)); ?>" alt="<?php echo e(isset($siteName) ? $siteName : config('app.name', 'AMS')); ?>" style="max-height: 50px;">
        <?php else: ?>
        <h1 class="sitename"><?php echo e(isset($siteName) ? $siteName : config('app.name', 'AMS')); ?></h1>
        <?php endif; ?>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <?php
            $menus = \App\Models\Menu::getActive();
            $currentRoute = Route::currentRouteName();
          ?>
          <?php $__empty_1 = true; $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <li>
            <a href="<?php echo e($menu->getLink()); ?>" 
               class="<?php if($menu->route_name && str_contains($currentRoute, explode('.', $menu->route_name)[0])): ?> active <?php elseif($menu->route_name === $currentRoute): ?> active <?php endif; ?>">
              <?php echo e($menu->label); ?>

            </a>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <!-- Fallback menu if no dynamic menus configured -->
          <li><a href="<?php echo e(route('home')); ?>" class="<?php if(Route::currentRouteName() == 'home'): ?> active <?php endif; ?>">Home</a></li>
          <li><a href="<?php echo e(route('about')); ?>" class="<?php if(Route::currentRouteName() == 'about'): ?> active <?php endif; ?>">About</a></li>
          <li><a href="<?php echo e(route('advisory.index')); ?>" class="<?php if(str_contains(Route::currentRouteName(), 'advisory')): ?> active <?php endif; ?>">Advisory</a></li>
          <li><a href="<?php echo e(route('team')); ?>" class="<?php if(Route::currentRouteName() == 'team'): ?> active <?php endif; ?>">Team</a></li>
          <li><a href="<?php echo e(route('faq.index')); ?>" class="<?php if(Route::currentRouteName() == 'faq.index'): ?> active <?php endif; ?>">FAQs</a></li>
          <li><a href="<?php echo e(route('contact.index')); ?>" class="<?php if(Route::currentRouteName() == 'contact.index'): ?> active <?php endif; ?>">Contact</a></li>
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
        <div class="col-lg-1 col-md-12">
        </div>
        <div class="col-lg-3 col-md-12 footer-info">
          <a href="<?php echo e(route('home')); ?>" class="logo d-flex align-items-center">
            <?php
              $logo = \App\Helpers\SettingHelper::get('site_logo');
            ?>
            <?php if($logo): ?>
            <img src="<?php echo e(asset('storage/' . $logo)); ?>" alt="<?php echo e(isset($siteName) ? $siteName : config('app.name', 'AMS')); ?>" style="margin-top: 25px;max-height: 150px;">
            <?php else: ?>
            <h1 class="sitename"><?php echo e(isset($siteName) ? $siteName : config('app.name', 'AMS')); ?></h1>
            <?php endif; ?>
          </a>
          <p><?php echo e(\App\Helpers\SettingHelper::get('footer_description', 'Your company description goes here. This is a professional business template.')); ?></p>
          <div class="social-links d-flex mt-4">
            <?php
              $twitter = \App\Helpers\SettingHelper::get('twitter_url');
              $facebook = \App\Helpers\SettingHelper::get('facebook_url');
              $instagram = \App\Helpers\SettingHelper::get('instagram_url');
              $linkedin = \App\Helpers\SettingHelper::get('linkedin_url');
            ?>
            <?php if($twitter): ?>
            <a href="<?php echo e($twitter); ?>" target="_blank" rel="noopener noreferrer"><i class="bi bi-twitter-x"></i></a>
            <?php endif; ?>
            <?php if($facebook): ?>
            <a href="<?php echo e($facebook); ?>" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a>
            <?php endif; ?>
            <?php if($instagram): ?>
            <a href="<?php echo e($instagram); ?>" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a>
            <?php endif; ?>
            <?php if($linkedin): ?>
            <a href="<?php echo e($linkedin); ?>" target="_blank" rel="noopener noreferrer"><i class="bi bi-linkedin"></i></a>
            <?php endif; ?>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li><a href="<?php echo e(route('portfolio.index')); ?>">Portfolio</a></li>
            <li><a href="<?php echo e(route('advisory.index')); ?>">Advisory</a></li>
            <li><a href="<?php echo e(route('faq.index')); ?>">Faqs</a></li>
            <?php $__empty_1 = true; $__currentLoopData = \App\Models\Page::where('published', 1)->orderBy('title')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <li><a href="<?php echo e(route('page.show', $page)); ?>"><?php echo e($page->title); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Portfolio Services</h4>
          <ul>
            <?php $__empty_1 = true; $__currentLoopData = \App\Models\Portfolio::where('published', 1)->orderBy('order')->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <li><a href="<?php echo e(route('portfolio.show', $service->id)); ?>"><?php echo e($service->title); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <?php endif; ?>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-lg-left">
          <h4>Contact Us</h4>
          <p>
            <strong>Address:</strong> <?php echo e(\App\Helpers\SettingHelper::get('site_address', 'A108 Adam Street, New York, NY 535022')); ?><br>
            <strong>Phone:</strong> <?php echo e(\App\Helpers\SettingHelper::get('site_phone', '+1 5589 55488 55')); ?><br>
            <strong>Fax:</strong> <?php echo e(\App\Helpers\SettingHelper::get('site_fax', '+1 5589 55488 55')); ?><br>
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