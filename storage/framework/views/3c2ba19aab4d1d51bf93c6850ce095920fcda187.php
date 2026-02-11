

<?php $__env->startSection('title', (isset($siteName) ? $siteName : 'AMS') . ' - Home'); ?>

<?php $__env->startSection('content'); ?>

<?php
  // Helper function to get home section content
  $getSection = function($name, $default = null) use ($homeSections) {
    if ($homeSections) {
      $section = $homeSections->firstWhere('section_name', $name);
      return $section ?: $default;
    }
    return $default;
  };
?>

<!-- Hero Section -->
<section id="hero" class="hero section light-background">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="hero-content">
          <h1 data-aos="fade-up" data-aos-delay="200"><?php echo e($getSection('hero')?->title ?? 'Transform Your Business Vision Into Reality'); ?></h1>
          <p data-aos="fade-up" data-aos-delay="300"><?php echo e($getSection('hero')?->description ?? 'We create innovative solutions that help businesses grow. Our expertise spans web design, development, and digital marketing.'); ?></p>
          <div class="hero-cta" data-aos="fade-up" data-aos-delay="400">
            <?php $heroSection = $getSection('hero'); ?>
            <a href="<?php echo e($heroSection?->button_link ?? route('contact.index')); ?>" class="btn-primary"><?php echo e($heroSection?->button_text ?? 'Get Started Today'); ?></a>
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="btn-secondary glightbox">
              <i class="bi bi-play-circle"></i>
              Watch Demo
            </a>
          </div>
          <!-- Hero Stats -->
          <div class="hero-stats" data-aos="fade-up" data-aos-delay="500">
            <div class="stat-item">
              <div class="stat-number">500+</div>
              <div class="stat-label">Successful Projects</div>
            </div>
            <div class="stat-item">
              <div class="stat-number">98%</div>
              <div class="stat-label">Client Satisfaction</div>
            </div>
            <div class="stat-item">
              <div class="stat-number">10+</div>
              <div class="stat-label">Years Experience</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <?php $heroImg = $getSection('hero')?->image; ?>
        <img src="<?php echo e($heroImg ? asset('storage/' . $heroImg) : asset('assets/img/about/about-square-10.webp')); ?>" class="img-fluid" alt="Hero Image" data-aos="zoom-out" data-aos-delay="300">
      </div>
    </div>
  </div>
</section>

<!-- About Preview Section -->
<section id="about" class="about section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row align-items-center">
      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
        <div class="content">
          <?php $aboutSection = $getSection('about'); ?>
          <h2><?php echo e($aboutSection?->title ?? 'Crafting Excellence Through Innovation and Dedication'); ?></h2>
          <p class="lead"><?php echo e($aboutSection?->subtitle ?? 'We are passionate professionals committed to delivering exceptional results that exceed expectations and drive meaningful transformation.'); ?></p>
          <p><?php echo e($aboutSection?->description ?? 'We are a team of passionate professionals dedicated to transforming ideas into digital reality. With years of experience in web design, development, and digital marketing, we help businesses of all sizes achieve their goals.'); ?></p>

          <!-- About Stats with Counters -->
          <div class="stats-row">
            <div class="stat-item">
              <div class="stat-number purecounter" data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"></div>
              <div class="stat-label">Years Experience</div>
            </div>
            <div class="stat-item">
              <div class="stat-number purecounter" data-purecounter-start="0" data-purecounter-end="850" data-purecounter-duration="1"></div>
              <div class="stat-label">Projects Completed</div>
            </div>
            <div class="stat-item">
              <div class="stat-number purecounter" data-purecounter-start="0" data-purecounter-end="240" data-purecounter-duration="1"></div>
              <div class="stat-label">Happy Clients</div>
            </div>
          </div>

          <div class="cta-section">
            <a href="<?php echo e($aboutSection?->button_link ?? route('about')); ?>" class="btn-learn-more"><?php echo e($aboutSection?->button_text ?? 'Learn More'); ?></a>
          </div>
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
        <?php $aboutImg = $getSection('about')?->image; ?>
        <img src="<?php echo e($aboutImg ? asset('storage/' . $aboutImg) : asset('assets/img/about/about-square-12.webp')); ?>" class="img-fluid rounded" alt="About Image">
      </div>
    </div>
  </div>
</section>

<!-- Services Section -->
<section id="services" class="services section light-background">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="section-title">
      <?php $servicesSection = $getSection('services'); ?>
      <h2><?php echo e($servicesSection?->title ?? 'Services'); ?></h2>
      <p><?php echo e($servicesSection?->description ?? 'Check our Services'); ?></p>
    </div>

    <div class="row gy-5">
      <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item">
          <div class="service-icon">
            <?php if($service->icon): ?>
            <i class="<?php echo e($service->icon); ?>"></i>
            <?php else: ?>
            <i class="bi bi-gear"></i>
            <?php endif; ?>
          </div>
          <h3><a href="<?php echo e(route('services.show', $service)); ?>"><?php echo e($service->title); ?></a></h3>
          <p><?php echo e($service->short_description); ?></p>
          <a href="<?php echo e(route('services.show', $service)); ?>" class="service-link">
            Learn More <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>

<!-- Why Choose Us Section -->
<section id="why-us" class="why-us section">
  <div class="container section-title" data-aos="fade-up">
    <?php $whyUsSection = $getSection('why-us'); ?>
    <h2><?php echo e($whyUsSection?->title ?? 'Why Choose Us'); ?></h2>
    <p><?php echo e($whyUsSection?->description ?? 'We deliver exceptional results through proven expertise, cutting-edge innovation, and unwavering commitment to your success.'); ?></p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row">
      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
        <div class="content">
          <h2><?php echo e($whyUsSection?->subtitle ?? 'Why Partner With Us'); ?></h2>
          <p><?php echo e($whyUsSection?->description ?? 'We deliver exceptional results through proven expertise, cutting-edge innovation, and unwavering commitment to your success. Our comprehensive approach ensures sustainable growth and competitive advantage.'); ?></p>
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
        <?php $whyUsImg = $getSection('why-us')?->image; ?>
        <img src="<?php echo e($whyUsImg ? asset('storage/' . $whyUsImg) : asset('assets/img/about/about-8.webp')); ?>" alt="Professional team collaboration" class="img-fluid">
      </div>
    </div>

    <div class="features-grid" data-aos="fade-up" data-aos-delay="400">
      <div class="row g-5">
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <div class="feature-item">
            <div class="icon-wrapper">
              <i class="bi bi-lightbulb"></i>
            </div>
            <div class="feature-content">
              <h3>Innovation Leadership</h3>
              <p>We stay ahead of industry trends, implementing cutting-edge technologies and methodologies that drive transformational results.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <div class="feature-item">
            <div class="icon-wrapper">
              <i class="bi bi-award"></i>
            </div>
            <div class="feature-content">
              <h3>Proven Expertise</h3>
              <p>Our team brings decades of combined experience across multiple industries, ensuring strategic insights and tactical execution.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
          <div class="feature-item">
            <div class="icon-wrapper">
              <i class="bi bi-headset"></i>
            </div>
            <div class="feature-content">
              <h3>24/7 Dedicated Support</h3>
              <p>Round-the-clock availability with personalized attention from dedicated account managers.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
          <div class="feature-item">
            <div class="icon-wrapper">
              <i class="bi bi-graph-up-arrow"></i>
            </div>
            <div class="feature-content">
              <h3>Cost Efficiency</h3>
              <p>Streamlined processes and intelligent resource allocation reduce overhead while maximizing ROI.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Portfolio Section -->
<section id="portfolio" class="portfolio section">
  <div class="container section-title" data-aos="fade-up">
    <?php $portfolioSection = $getSection('portfolio'); ?>
    <h2><?php echo e($portfolioSection?->title ?? 'Check Our Portfolio'); ?></h2>
    <p><?php echo e($portfolioSection?->description ?? 'Explore our latest projects and success stories'); ?></p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
      <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="200">
        <li data-filter="*" class="filter-active">All Work</li>
        <li data-filter=".filter-web">Web Design</li>
        <li data-filter=".filter-app">Development</li>
        <li data-filter=".filter-design">Design</li>
      </ul>

      <div class="row gy-5 isotope-container" data-aos="fade-up" data-aos-delay="300">
        <?php $__empty_1 = true; $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-lg-12 portfolio-item isotope-item filter-web">
          <article class="portfolio-card">
            <div class="row g-4">
              <?php if($loop->even): ?>
              <div class="col-md-6 order-md-2">
              <?php else: ?>
              <div class="col-md-6">
              <?php endif; ?>
                <div class="project-visual">
                  <?php if($portfolio->image): ?>
                    <img src="<?php echo e(asset('storage/' . $portfolio->image)); ?>" alt="<?php echo e($portfolio->title); ?>" class="img-fluid">
                  <?php else: ?>
                    <?php
                      $placeholders = ['portfolio-1.webp', 'portfolio-2.webp', 'portfolio-3.webp', 'portfolio-4.webp', 'portfolio-5.webp', 'portfolio-6.webp'];
                      $placeholder = $placeholders[$loop->index % count($placeholders)];
                    ?>
                    <img src="<?php echo e(asset('assets/img/portfolio/' . $placeholder)); ?>" alt="<?php echo e($portfolio->title); ?>" class="img-fluid">
                  <?php endif; ?>
                  <div class="project-overlay">
                    <div class="overlay-content">
                      <?php if($portfolio->image): ?>
                        <a href="<?php echo e(asset('storage/' . $portfolio->image)); ?>" class="view-project glightbox" title="<?php echo e($portfolio->title); ?>">
                          <i class="bi bi-eye"></i>
                        </a>
                      <?php else: ?>
                        <a href="<?php echo e(asset('assets/img/portfolio/' . $placeholder)); ?>" class="view-project glightbox" title="<?php echo e($portfolio->title); ?>">
                          <i class="bi bi-eye"></i>
                        </a>
                      <?php endif; ?>
                      <a href="<?php echo e(route('portfolio.show', $portfolio)); ?>" class="project-link">
                        <i class="bi bi-arrow-up-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <?php if($loop->even): ?>
              <div class="col-md-6 order-md-1">
              <?php else: ?>
              <div class="col-md-6">
              <?php endif; ?>
                <div class="project-details">
                  <div class="project-header">
                    <span class="project-category"><?php echo e($portfolio->category); ?></span>
                    <time class="project-year">2024</time>
                  </div>
                  <h3 class="project-title"><?php echo e($portfolio->title); ?></h3>
                  <p class="project-description"><?php echo e($portfolio->description); ?></p>
                  <div class="project-meta">
                    <span class="client-name"><?php echo e($portfolio->client ?? 'Professional Project'); ?></span>
                  </div>
                </div>
              </div>
            </div>
          </article>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-lg-12 text-center">
          <p>No portfolio items available yet.</p>
        </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="portfolio-conclusion" data-aos="fade-up" data-aos-delay="400">
      <div class="conclusion-content">
        <h4>Ready to elevate your business?</h4>
        <p>Let's discuss how we can transform your digital presence and drive meaningful results for your organization.</p>
        <div class="conclusion-actions">
          <a href="<?php echo e(route('contact.index')); ?>" class="primary-action">
            Start Conversation
            <i class="bi bi-arrow-right"></i>
          </a>
          <a href="<?php echo e(route('portfolio.index')); ?>" class="secondary-action">
            View All Projects
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Team Section -->
<section id="team" class="team section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Meet Our Team</h2>
    <p>Our Professional Team</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-5">
      <?php $__currentLoopData = $teamMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
        <div class="team-member">
          <div class="member-img">
            <?php if($member->image): ?>
              <img src="<?php echo e(asset('storage/' . $member->image)); ?>" class="img-fluid" alt="<?php echo e($member->name); ?>">
            <?php else: ?>
              <?php
                $personPlaceholders = ['person-f-8.webp', 'person-m-12.webp', 'person-f-3.webp', 'person-m-7.webp', 'person-f-12.webp', 'person-m-8.webp', 'person-f-6.webp', 'person-m-12.webp'];
                $personPlaceholder = $personPlaceholders[$loop->index % count($personPlaceholders)];
              ?>
              <img src="<?php echo e(asset('assets/img/person/' . $personPlaceholder)); ?>" class="img-fluid" alt="<?php echo e($member->name); ?>">
            <?php endif; ?>
          </div>
          <div class="member-info">
            <h4><?php echo e($member->name); ?></h4>
            <span><?php echo e($member->position); ?></span>
            <p><?php echo e($member->bio); ?></p>
            <div class="social">
              <?php if($member->twitter): ?><a href="<?php echo e($member->twitter); ?>"><i class="bi bi-twitter-x"></i></a><?php endif; ?>
              <?php if($member->linkedin): ?><a href="<?php echo e($member->linkedin); ?>"><i class="bi bi-linkedin"></i></a><?php endif; ?>
              <?php if($member->instagram): ?><a href="<?php echo e($member->instagram); ?>"><i class="bi bi-instagram"></i></a><?php endif; ?>
              <?php if($member->facebook): ?><a href="<?php echo e($member->facebook); ?>"><i class="bi bi-facebook"></i></a><?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials section light-background">
  <div class="container section-title" data-aos="fade-up">
    <?php $testimonialSection = $getSection('testimonials'); ?>
    <h2><?php echo e($testimonialSection?->title ?? 'What They Say'); ?></h2>
    <p><?php echo e($testimonialSection?->description ?? 'Hear from our satisfied clients and partners'); ?></p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="testimonial-slider swiper init-swiper">
      <script type="application/json" class="swiper-config">
        {
          "loop": true,
          "speed": 600,
          "autoplay": {
            "delay": 4000
          },
          "slidesPerView": 1,
          "spaceBetween": 30,
          "navigation": {
            "nextEl": ".swiper-button-next",
            "prevEl": ".swiper-button-prev"
          },
          "breakpoints": {
            "768": {
              "slidesPerView": 2
            },
            "1200": {
              "slidesPerView": 3
            }
          }
        }
      </script>

      <div class="swiper-wrapper">
        <!-- Testimonial 1 -->
        <div class="swiper-slide">
          <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="200">
            <div class="testimonial-header">
              <img src="<?php echo e(asset('assets/img/person/person-f-12.webp')); ?>" alt="Jessica Martinez" class="img-fluid rounded-circle">
              <div class="rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
            </div>
            <div class="testimonial-body">
              <p>"Exceptional work and professionalism. The team delivered exactly what we needed and exceeded our expectations. Highly recommended!"</p>
            </div>
            <div class="testimonial-footer">
              <h5>Jessica Martinez</h5>
              <span>UX Designer</span>
              <div class="quote-icon">
                <i class="bi bi-chat-quote-fill"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Testimonial 2 -->
        <div class="swiper-slide">
          <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="300">
            <div class="testimonial-header">
              <img src="<?php echo e(asset('assets/img/person/person-m-8.webp')); ?>" alt="Client" class="img-fluid rounded-circle">
              <div class="rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
            </div>
            <div class="testimonial-body">
              <p>"Outstanding results and great communication throughout the project. They understood our requirements perfectly and delivered on time."</p>
            </div>
            <div class="testimonial-footer">
              <h5>David Rodriguez</h5>
              <span>Software Engineer</span>
              <div class="quote-icon">
                <i class="bi bi-chat-quote-fill"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Testimonial 3 -->
        <div class="swiper-slide">
          <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="400">
            <div class="testimonial-header">
              <img src="<?php echo e(asset('assets/img/person/person-f-6.webp')); ?>" alt="Amanda Wilson" class="img-fluid rounded-circle">
              <div class="rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
            </div>
            <div class="testimonial-body">
              <p>"Perfect partnership! They understood our vision and brought it to life beautifully. The attention to detail was remarkable."</p>
            </div>
            <div class="testimonial-footer">
              <h5>Amanda Wilson</h5>
              <span>Creative Director</span>
              <div class="quote-icon">
                <i class="bi bi-chat-quote-fill"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Testimonial 4 -->
        <div class="swiper-slide">
          <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="500">
            <div class="testimonial-header">
              <img src="<?php echo e(asset('assets/img/person/person-m-12.webp')); ?>" alt="Ryan Thompson" class="img-fluid rounded-circle">
              <div class="rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
            </div>
            <div class="testimonial-body">
              <p>"Professional team with excellent attention to detail. They delivered on time and on budget. Would work with them again in a heartbeat!"</p>
            </div>
            <div class="testimonial-footer">
              <h5>Ryan Thompson</h5>
              <span>Business Analyst</span>
              <div class="quote-icon">
                <i class="bi bi-chat-quote-fill"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Testimonial 5 -->
        <div class="swiper-slide">
          <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="600">
            <div class="testimonial-header">
              <img src="<?php echo e(asset('assets/img/person/person-f-10.webp')); ?>" alt="Rachel Chen" class="img-fluid rounded-circle">
              <div class="rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
            </div>
            <div class="testimonial-body">
              <p>"Fantastic collaboration and support. They truly care about client success. Our project went from concept to completion seamlessly."</p>
            </div>
            <div class="testimonial-footer">
              <h5>Rachel Chen</h5>
              <span>Project Manager</span>
              <div class="quote-icon">
                <i class="bi bi-chat-quote-fill"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="swiper-navigation">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>
  </div>
</section>

<!-- Contact CTA Section -->
<section id="contact-cta" class="contact-cta section light-background">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <h2>Ready to get started?</h2>
    <p>Contact us today to discuss your project and how we can help you achieve your goals.</p>
    <a href="<?php echo e(route('contact.index')); ?>" class="cta-btn">Get In Touch</a>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/frontend/index.blade.php ENDPATH**/ ?>