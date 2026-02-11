

<?php $__env->startSection('title', 'Dashboard - Admin'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<!-- Stats Cards -->
<div class="row">
  <div class="col-md-6 col-lg-3">
    <div class="stat-card">
      <div class="stat-value"><?php echo e($stats['services']); ?></div>
      <div class="stat-label">Services</div>
    </div>
  </div>

  <div class="col-md-6 col-lg-3">
    <div class="stat-card" style="border-left-color: #28a745;">
      <div class="stat-value" style="color: #28a745;"><?php echo e($stats['portfolios']); ?></div>
      <div class="stat-label">Portfolio Items</div>
    </div>
  </div>

  <div class="col-md-6 col-lg-3">
    <div class="stat-card" style="border-left-color: #ffc107;">
      <div class="stat-value" style="color: #ffc107;"><?php echo e($stats['team_members']); ?></div>
      <div class="stat-label">Team Members</div>
    </div>
  </div>

  <div class="col-md-6 col-lg-3">
    <div class="stat-card" style="border-left-color: #dc3545;">
      <div class="stat-value" style="color: #dc3545;"><?php echo e($stats['contacts']); ?></div>
      <div class="stat-label">Unread Messages</div>
    </div>
  </div>
</div>

<!-- Quick Actions -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">Quick Actions</div>
      <div class="card-body" style="padding: 20px;">
        <a href="<?php echo e(route('admin.home-sections.index')); ?>" class="btn btn-success">📋 Manage Home Sections</a>
        <a href="<?php echo e(route('admin.services.create')); ?>" class="btn btn-primary">+ Add Service</a>
        <a href="<?php echo e(route('admin.portfolio.create')); ?>" class="btn btn-primary">+ Add Portfolio Item</a>
        <a href="<?php echo e(route('admin.team.create')); ?>" class="btn btn-primary">+ Add Team Member</a>
        <a href="<?php echo e(route('admin.pages.create')); ?>" class="btn btn-primary">+ Add Page</a>
        <a href="<?php echo e(route('admin.settings.index')); ?>" class="btn btn-warning">⚙️ Settings</a>
      </div>
    </div>
  </div>
</div>

<!-- Recent Contacts -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Latest Contact Messages
        <a href="<?php echo e(route('admin.contacts.index')); ?>" class="btn btn-sm btn-secondary" style="float: right;">View All</a>
      </div>
      <div style="overflow-x: auto;">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Subject</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $recentContacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($contact->name); ?></td>
              <td><?php echo e($contact->email); ?></td>
              <td><?php echo e(substr($contact->subject, 0, 30)); ?>...</td>
              <td><?php echo e($contact->created_at->format('M d, Y H:i')); ?></td>
              <td>
                <a href="<?php echo e(route('admin.contacts.show', $contact)); ?>" class="btn btn-sm btn-primary">View</a>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>