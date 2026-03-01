

<?php $__env->startSection('title', 'Menu Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Menu Items</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="<?php echo e(route('admin.menus.create')); ?>" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add Menu Item
            </a>
        </div>
    </div>

    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e($message); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>

    <?php if(count($menus) > 0): ?>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Order</th>
                        <th>Label</th>
                        <th>Route/URL</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="menu-list">
                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="menu-item" data-id="<?php echo e($menu->id); ?>" draggable="true">
                        <td>
                            <input type="number" class="form-control form-control-sm order-input" value="<?php echo e($menu->order); ?>" style="width: 80px;">
                        </td>
                        <td><?php echo e($menu->label); ?></td>
                        <td>
                            <?php if($menu->route_name): ?>
                            <span class="badge bg-info"><?php echo e($menu->route_name); ?></span>
                            <?php else: ?>
                            <span class="badge bg-secondary"><?php echo e($menu->url); ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <span class="badge <?php if($menu->active): ?> bg-success <?php else: ?> bg-danger <?php endif; ?>">
                                <?php if($menu->active): ?> Active <?php else: ?> Inactive <?php endif; ?>
                            </span>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.menus.edit', $menu)); ?>" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <!-- <form action="<?php echo e(route('admin.menus.destroy', $menu)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form> -->
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        <button id="save-order" class="btn btn-success">
            <i class="bi bi-check-circle"></i> Save Order
        </button>
    </div>
    <?php else: ?>
    <div class="alert alert-info">
        No menu items yet. <a href="<?php echo e(route('admin.menus.create')); ?>">Create one</a>
    </div>
    <?php endif; ?>
</div>

<script>
document.getElementById('save-order').addEventListener('click', function() {
    const items = [];
    document.querySelectorAll('.menu-item').forEach((row, index) => {
        items.push({
            id: row.dataset.id,
            order: row.querySelector('.order-input').value
        });
    });

    fetch('<?php echo e(route("admin.menus.reorder")); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('[name="_token"]').value
        },
        body: JSON.stringify({ items: items })
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            alert('Menu order saved successfully!');
            location.reload();
        }
    });
});

// Drag and drop reordering
let draggedRow = null;

document.querySelectorAll('.menu-item').forEach(row => {
    row.addEventListener('dragstart', function() {
        draggedRow = this;
        this.style.opacity = '0.5';
    });

    row.addEventListener('dragend', function() {
        this.style.opacity = '1';
    });

    row.addEventListener('dragover', function(e) {
        e.preventDefault();
        if(this !== draggedRow) {
            this.parentNode.insertBefore(draggedRow, this);
        }
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\project\sanq\mike\Axis-Laravel\resources\views/admin/menus/index.blade.php ENDPATH**/ ?>