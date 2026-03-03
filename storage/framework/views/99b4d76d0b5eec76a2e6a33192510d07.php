

<?php
  $currentMenu = \App\Models\Menu::getCurrentPageMenu();
  $pageTitle = $currentMenu?->label ?? 'About';
  $breadcrumbs = \App\Models\Menu::getBreadcrumbs();
?>

<?php $__env->startSection('title', (isset($siteName) ? $siteName : 'AMS') . ' - ' . $pageTitle); ?>

<style>
  .read-more-btn {
    margin-top: 15px;
  }

  .team-member-modal .modal-body {
    text-align: center;
  }

  .team-member-modal .member-modal-img {
    width: 250px;
    height: 250px;
    margin: 0 auto 20px;
    border-radius: 8px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .team-member-modal .member-modal-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .team-member-modal .member-details {
    text-align: left;
  }

  .team-member-modal .social {
    margin-top: 20px;
    display: flex;
    gap: 10px;
    justify-content: center;
  }

  .team-member-modal .social a {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background-color: #f0f0f0;
    color: #333;
    transition: all 0.3s ease;
  }

  .team-member-modal .social a:hover {
    background-color: #007bff;
    color: white;
  }
</style>

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
?>



<?php $teamSection = $getSection('team');  ?>
<section id="team" class="team section">
  <div class="container section-title" data-aos="fade-up">
    <h2><?php echo e($teamSection?->title ?? 'Meet Our Team'); ?></h2>
    <p><?php echo e($teamSection?->subtitle ?? 'Our Professional Team'); ?></p>
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
            <button class="btn btn-primary btn-sm read-more-btn" onclick="openTeamModal(<?php echo e($member->id); ?>)">Read More</button>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>

<!-- Team Member Modal -->
<div class="modal fade" id="teamMemberModal" tabindex="-1" role="dialog" aria-labelledby="teamMemberModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content team-member-modal">
      <div class="modal-header">
        <h5 class="modal-title" id="teamMemberModalLabel">Team Member Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="padding:50px">
        <div class="member-modal-img" id="memberModalImage">
          <!-- Image will be inserted here -->
        </div>
        <h3 id="memberModalName"></h3>
        <p style="color: #666; font-size: 16px; font-weight: 500;" id="memberModalPosition"></p>
        
        <div id="memberContactInfo" style="margin: 20px 0; padding: 15px; background-color: #f9f9f9; border-radius: 5px;">
          <div id="memberEmailDiv" style="display: none; margin-bottom: 10px;">
            <strong>📧 Email:</strong> <a href="mailto:" id="memberEmail"></a>
          </div>
          <div id="memberPhoneDiv" style="display: none;">
            <strong>📞 Phone:</strong> <a href="tel:" id="memberPhone"></a>
          </div>
        </div>

        <div class="member-details">
          <p id="memberModalBio"></p>
        </div>
        <div class="social" id="memberModalSocial">
          <!-- Social links will be inserted here -->
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  const teamMembers = <?php echo json_encode($teamMembers, 15, 512) ?>;

  function openTeamModal(memberId) {
    const member = teamMembers.find(m => m.id === memberId);
    
    if (!member) return;

    // Set member details
    document.getElementById('memberModalName').textContent = member.name;
    document.getElementById('memberModalPosition').textContent = member.position;
    document.getElementById('memberModalBio').innerHTML = member.bio || '';

    // Set image
    let imageHtml = '';
    if (member.image) {
      imageHtml = `<img src="/storage/${member.image}" alt="${member.name}">`;
    } else {
      const personPlaceholders = ['person-f-8.webp', 'person-m-12.webp', 'person-f-3.webp', 'person-m-7.webp', 'person-f-12.webp', 'person-m-8.webp', 'person-f-6.webp', 'person-m-12.webp'];
      const placeholderImg = personPlaceholders[Math.floor(Math.random() * personPlaceholders.length)];
      imageHtml = `<img src="/assets/img/person/${placeholderImg}" alt="${member.name}">`;
    }
    document.getElementById('memberModalImage').innerHTML = imageHtml;

    // Set email
    if (member.email) {
      document.getElementById('memberEmail').href = `mailto:${member.email}`;
      document.getElementById('memberEmail').textContent = member.email;
      document.getElementById('memberEmailDiv').style.display = 'block';
    } else {
      document.getElementById('memberEmailDiv').style.display = 'none';
    }

    // Set phone
    if (member.phone) {
      document.getElementById('memberPhone').href = `tel:${member.phone}`;
      document.getElementById('memberPhone').textContent = member.phone;
      document.getElementById('memberPhoneDiv').style.display = 'block';
    } else {
      document.getElementById('memberPhoneDiv').style.display = 'none';
    }

    // Set social links
    let socialHtml = '';
    if (member.twitter) {
      socialHtml += `<a href="${member.twitter}" target="_blank"><i class="bi bi-twitter-x"></i></a>`;
    }
    if (member.facebook) {
      socialHtml += `<a href="${member.facebook}" target="_blank"><i class="bi bi-facebook"></i></a>`;
    }
    if (member.instagram) {
      socialHtml += `<a href="${member.instagram}" target="_blank"><i class="bi bi-instagram"></i></a>`;
    }
    if (member.linkedin) {
      socialHtml += `<a href="${member.linkedin}" target="_blank"><i class="bi bi-linkedin"></i></a>`;
    }
    document.getElementById('memberModalSocial').innerHTML = socialHtml;

    // Show modal
    const modal = new bootstrap.Modal(document.getElementById('teamMemberModal'));
    modal.show();
  }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/frontend/about.blade.php ENDPATH**/ ?>