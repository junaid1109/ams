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
  <link href="<?php echo e(asset('storage/' . $favicon)); ?>" rel="icon" type="image/x-icon">
  <link href="<?php echo e(asset('storage/' . $favicon)); ?>" rel="icon" type="image/png" sizes="any">
  <?php else: ?>
  <link href="<?php echo e(asset('assets/img/favicon.png')); ?>" rel="icon" type="image/x-icon">
  <link href="<?php echo e(asset('assets/img/favicon.png')); ?>" rel="icon" type="image/png" sizes="any">
  <?php endif; ?>
  
  <!-- Apple Touch Icon - Multiple sizes for iPad and iPhone -->
  <?php if($favicon): ?>
  <link href="<?php echo e(asset('storage/' . $favicon)); ?>" rel="apple-touch-icon" sizes="180x180">
  <link href="<?php echo e(asset('storage/' . $favicon)); ?>" rel="apple-touch-icon" sizes="152x152">
  <link href="<?php echo e(asset('storage/' . $favicon)); ?>" rel="apple-touch-icon" sizes="144x144">
  <link href="<?php echo e(asset('storage/' . $favicon)); ?>" rel="apple-touch-icon" sizes="120x120">
  <?php else: ?>
  <link href="<?php echo e(asset('assets/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon" sizes="180x180">
  <link href="<?php echo e(asset('assets/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon" sizes="152x152">
  <link href="<?php echo e(asset('assets/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon" sizes="144x144">
  <link href="<?php echo e(asset('assets/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon" sizes="120x120">
  <?php endif; ?>
  
  <!-- Web App Manifest for PWA and Android -->
  <link href="<?php echo e(asset('manifest.json')); ?>" rel="manifest">
  
  <!-- Theme Color for Mobile -->
  <meta name="theme-color" content="#0d6efd">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="apple-mobile-web-app-title" content="<?php echo e(isset($siteName) ? $siteName : config('app.name', 'AMS')); ?>">

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
    }

    /* CKEditor Content Styling - Image Alignments */
    .text-block-content,
    .member-details,
    [class*="content"] figure,
    figure.image {
      /* Base styling */
    }

    /* Default figure styling for all CKEditor content */
    figure.image {
      display: block;
      margin: 10px 0;
    }

    figure.image img {
      max-width: 100%;
      height: auto;
      display: block;
    }

    figure.image figcaption {
      font-size: 0.85rem;
      color: #888;
      margin-top: 8px;
      text-align: center;
      font-style: italic;
    }

    /* Full width images */
    figure.image.image-style-full,
    .ck-content .image-style-full {
      width: 100%;
      margin: 15px 0;
      display: block !important;
    }

    figure.image.image-style-full img,
    .ck-content .image-style-full img {
      width: 100%;
      height: auto;
      display: block;
    }

    /* Center align images - HIGHEST PRIORITY */
    figure.image.image-style-center,
    figure.image.image-style-align-center,
    figure.image[style*="align-center"],
    figure.image[style*="text-align:center"],
    .text-block-content figure.image-style-center,
    .member-details figure.image-style-center,
    .portfolio-details div figure.image-style-center,
    .portfolio-details div figure[style*="text-align:center"] {
      display: block !important;
      text-align: center !important;
      margin: 15px auto !important;
      clear: both !important;
      max-width: 100%;
      width: auto !important;
    }

    figure.image.image-style-center img,
    figure.image.image-style-align-center img,
    figure.image[style*="align-center"] img,
    figure.image[style*="text-align:center"] img,
    .portfolio-details div figure.image-style-center img,
    .portfolio-details div figure[style*="text-align:center"] img {
      width: auto !important;
      max-width: 100%;
      height: auto;
      display: inline-block !important;
      margin: 0 auto !important;
    }

    /* Universal center align for all figure elements */
    figure[style*="text-align: center"] {
      text-align: center !important;
      margin: 15px auto !important;
      display: block !important;
      width: auto !important;
    }

    figure[style*="text-align: center"] img {
      display: inline-block !important;
      margin: 0 auto !important;
    }

    /* Side/Float right images */
    figure.image.image-style-side,
    figure.image.image-style-align-right,
    figure.image.image_resized.w50 figure,
    .text-block-content figure.image-style-side {
      float: right;
      margin: 0 0 20px 25px;
      max-width: 45%;
      clear: right;
      display: block;
    }

    figure.image.image-style-side img,
    figure.image.image-style-align-right img {
      width: 100%;
      height: auto;
      display: block;
    }

    /* Left align images */
    figure.image.image-style-left,
    figure.image.image-style-align-left,
    figure.image[style*="align-left"],
    .text-block-content figure.image-style-left {
      float: left;
      margin: 0 25px 20px 0;
      max-width: 45%;
      clear: left;
      display: block;
    }

    figure.image.image-style-left img,
    figure.image.image-style-align-left img {
      width: 100%;
      height: auto;
      display: block;
    }

    /* Right align images */
    figure.image.image-style-right,
    figure.image.image-style-align-right,
    figure.image[style*="align-right"],
    .text-block-content figure.image-style-right {
      float: right;
      margin: 0 0 20px 25px;
      max-width: 45%;
      clear: right;
      display: block;
    }

    figure.image.image-style-right img,
    figure.image.image-style-align-right img {
      width: 100%;
      height: auto;
      display: block;
    }

    /* Handle inline styles from CKEditor */
    figure[style*="text-align"] {
      text-align: inherit !important;
    }

    figure[style*="text-align: left"] {
      text-align: left;
      margin: 10px 0;
      display: block;
    }

    figure[style*="text-align: right"] {
      text-align: right;
      margin: 10px 0;
      display: block;
    }

    /* Member bio content wrapper styling */
    .member-bio-content {
      display: block;
    }

    .member-bio-content figure.image-style-center,
    .member-bio-content figure[style*="text-align: center"],
    .member-bio-content figure[style*="align-center"] {
      text-align: center !important;
      margin: 15px auto !important;
      display: block !important;
      clear: both !important;
    }

    .member-bio-content figure.image-style-center img,
    .member-bio-content figure[style*="text-align: center"] img,
    .member-bio-content figure[style*="align-center"] img {
      display: inline-block !important;
      margin: 0 auto !important;
      text-align: center;
    }

    /* Clear floats after content */
    .text-block-content::after,
    .member-details::after,
    .member-bio-content::after {
      content: "";
      display: table;
      clear: both;
    }

    /* CKEditor Table Styling */
    table,
    .text-block-content table,
    .member-details table,
    .member-bio-content table,
    [class*="content"] table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
      border: 1px solid #ddd;
    }

    table thead,
    .text-block-content table thead,
    .member-details table thead,
    .member-bio-content table thead {
      background-color: #f8f9fa;
    }

    table th,
    .text-block-content table th,
    .member-details table th,
    .member-bio-content table th {
      padding: 12px 15px;
      border: 1px solid #ddd;
      text-align: left;
      font-weight: 600;
      color: #333;
      background-color: #f8f9fa;
    }

    table td,
    .text-block-content table td,
    .member-details table td,
    .member-bio-content table td {
      padding: 12px 15px;
      border: 1px solid #ddd;
      color: #555;
    }

    table tbody tr:hover,
    .text-block-content table tbody tr:hover,
    .member-details table tbody tr:hover,
    .member-bio-content table tbody tr:hover {
      background-color: #f5f5f5;
    }

    table tbody tr:nth-child(odd),
    .text-block-content table tbody tr:nth-child(odd),
    .member-details table tbody tr:nth-child(odd),
    .member-bio-content table tbody tr:nth-child(odd) {
      background-color: #fafafa;
    }

    /* Responsive table */
    @media (max-width: 768px) {
      table,
      .text-block-content table,
      .member-details table,
      .member-bio-content table {
        font-size: 14px;
      }

      table th,
      table td,
      .text-block-content table th,
      .text-block-content table td,
      .member-details table th,
      .member-details table td,
      .member-bio-content table th,
      .member-bio-content table td {
        padding: 8px 10px;
      }
    }

    /* Responsive adjustments for smaller screens */
    @media (max-width: 768px) {
      figure.image.image-style-side,
      figure.image.image-style-left,
      figure.image.image-style-right,
      .member-bio-content figure.image-style-side,
      .member-bio-content figure.image-style-left,
      .member-bio-content figure.image-style-right {
        float: none !important;
        margin: 15px 0 !important;
        max-width: 100%;
        clear: both;
      }

      figure.image.image-style-side img,
      figure.image.image-style-left img,
      figure.image.image-style-right img,
      .member-bio-content figure img {
        width: 100%;
      }

      .member-img {
        height: auto !important;
        max-height: none !important;
      }

      .member-img img {
        height: auto !important;
        width: 100%;
      }
    }

    .footer-map h4 {
      margin-bottom: 15px;
      font-size: 16px;
    }

    .footer-map .map-container {
      width: 100%;
      height: 180px;
    }

    .footer-map iframe {
      width: 100%;
      height: 180px;
      border-radius: 8px;
    }

    /* Portfolio Intro Section */
    .portfolio-intro {
      padding: 60px 0;
      border-bottom: 1px solid #f0f0f0;
    }

    .portfolio-intro .intro-content {
      line-height: 1.8;
      color: #555;
      font-size: 16px;
    }

    .portfolio-intro .intro-content p {
      margin-bottom: 15px;
      color: #666;
    }

    .portfolio-intro .intro-content h2 {
      margin-top: 30px;
      margin-bottom: 20px;
      font-size: 24px;
      font-weight: 600;
      color: #333;
    }

    .portfolio-intro .intro-content strong {
      color: #333;
      font-weight: 600;
    }

    /* Mobile Footer Centering */
    @media (max-width: 768px) {
      .footer-info,
      .footer-links,
      .footer-contact,
      .footer-map {
        text-align: center !important;
      }

      .footer-info .logo {
        justify-content: center;
      }

      .footer-info .social-links {
        justify-content: center;
      }

      .footer-links h4,
      .footer-contact h4,
      .footer-map h4 {
        text-align: center !important;
      }

      .footer-links ul {
        margin-left: auto !important;
        margin-right: auto !important;
        padding-left: 0 !important;
        list-style: none !important;
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
      }

      .footer-links ul li {
        text-align: center !important;
        width: auto !important;
      }

      .footer-links ul li a {
        display: inline-block !important;
        padding: 5px 0 !important;
      }

      .footer-contact p {
        text-align: center !important;
      }

      .footer-contact strong {
        display: block;
        margin-bottom: 5px;
      }

      .footer-map {
        margin-top: 20px;
      }
    }

    /* Reduce gap between portfolio-intro and services sections */
    .portfolio-intro {
      margin-bottom: 0 !important;
      padding-bottom: 30px !important;
    }

    .portfolio-intro + .services {
      margin-top: 0 !important;
      padding-top: 30px !important;
    }
  </style>

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

          <div class="col-lg-3 col-md-12 footer-info">
            <a href="<?php echo e(route('home')); ?>" class="logo d-flex align-items-center">
              <?php
                $logo = \App\Helpers\SettingHelper::get('site_logo');
              ?>
              <?php if($logo): ?>
              <img src="<?php echo e(asset('storage/' . $logo)); ?>" alt="<?php echo e(isset($siteName) ? $siteName : config('app.name', 'AMS')); ?>" style="margin-top: 25px;max-height: 120px;">
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
          <!-- <div class="col-lg-1"></div> -->
          <div class="col-lg-2 col-md-12 footer-links">
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

          <div class="col-lg-2 col-md-12 footer-links">
            <h4>Portfolio Services</h4>
            <ul>
              <?php $__empty_1 = true; $__currentLoopData = \App\Models\Portfolio::where('published', 1)->orderBy('order')->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <li><a href="<?php echo e(route('portfolio.show', $service->slug)); ?>"><?php echo e($service->title); ?></a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Web Development</a></li>
              <li><a href="#">Product Management</a></li>
              <?php endif; ?>
            </ul>
          </div>

          <div class="col-lg-2 col-md-12 footer-contact text-lg-left">
            <h4>Contact Us</h4>
            <p>
              <strong>Address:</strong> <?php echo e(\App\Helpers\SettingHelper::get('site_address', 'A108 Adam Street, New York, NY 535022')); ?><br>
              <strong>Phone:</strong> <?php echo e(\App\Helpers\SettingHelper::get('site_phone', '+1 5589 55488 55')); ?><br>
              <strong>Fax:</strong> <?php echo e(\App\Helpers\SettingHelper::get('site_fax', '+1 5589 55488 55')); ?><br>
              <strong>Email:</strong> <?php echo e(\App\Helpers\SettingHelper::get('site_email', 'info@ams.com')); ?><br>
            </p>
          </div>

          
          <div class="col-lg-3 col-md-12 footer-map">
            <h4>Our Location</h4>
            <div class="map-container" style="border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
              <?php
                $mapEmbed = \App\Helpers\SettingHelper::get('google_map_embed');
                $mapLat = \App\Helpers\SettingHelper::get('map_latitude', '40.7128');
                $mapLng = \App\Helpers\SettingHelper::get('map_longitude', '-74.0060');
              ?>
              
              <?php if($mapEmbed): ?>
                <?php echo $mapEmbed; ?>

              <?php else: ?>
                <iframe 
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3588.4755285851644!2d28.129372!3d-25.9762582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e956e39a536eab9%3A0xe1ab4b1ab867acd4!2s500%2016th%20Rd%2C%20Randjespark%2C%20Midrand%2C%201683%2C%20South%20Africa!5e0!3m2!1sen!2sus!4v1234567890"
                  width="100%" 
                  height="180" 
                  style="border:0;" 
                  allowfullscreen="" 
                  loading="lazy" 
                  referrerpolicy="no-referrer-when-downgrade">
                </iframe>
              <?php endif; ?>
            </div>
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