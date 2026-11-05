

<?php $__env->startSection('title', 'Teachers Directory - School Management'); ?>
<?php $__env->startSection('page-title', 'Teachers & Faculty Directory'); ?>

<?php $__env->startSection('content'); ?>
<div class="custom-card mb-4">
    <div class="p-3 border-bottom d-flex flex-wrap justify-content-between align-items-center gap-3">
        <!-- Search Form -->
        <form method="GET" action="<?php echo e(route('teachers.index')); ?>" class="d-flex align-items-center gap-2 flex-grow-1" style="max-width: 450px;">
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                <input type="text" name="search" value="<?php echo e(request('search')); ?>" class="form-control border-start-0" placeholder="Search teacher by name, subject, phone...">
            </div>
            <button type="submit" class="btn btn-secondary btn-sm">Search</button>
            <?php if(request('search')): ?>
                <a href="<?php echo e(route('teachers.index')); ?>" class="btn btn-outline-secondary btn-sm">Clear</a>
            <?php endif; ?>
        </form>

        <a href="<?php echo e(route('teachers.create')); ?>" class="btn btn-primary">
            <i class="bi bi-person-plus-fill me-1"></i> Add Faculty Member
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle m-0">
            <thead class="table-light">
                <tr style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">
                    <th>Faculty Member</th>
                    <th>Teaching Subject</th>
                    <th>Qualification</th>
                    <th>Phone / Contact</th>
                    <th>Salary (PKR)</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle bg-emerald-soft text-success d-flex align-items-center justify-content-center fw-bold" style="width: 38px; height: 38px;">
                                    <?php echo e(strtoupper(substr($teacher->name, 0, 1))); ?>

                                </div>
                                <div>
                                    <a href="<?php echo e(route('teachers.show', $teacher)); ?>" class="fw-bold text-dark text-decoration-none">
                                        <?php echo e($teacher->name); ?>

                                    </a>
                                    <div class="text-muted" style="font-size: 12px;"><?php echo e($teacher->designation ?? 'Teacher'); ?></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-primary border px-2 py-1 fs-7">
                                <i class="bi bi-book me-1"></i> <?php echo e($teacher->subject); ?>

                            </span>
                        </td>
                        <td class="text-secondary" style="font-size: 13px;">
                            <?php echo e($teacher->qualification ?? '-'); ?>

                        </td>
                        <td style="font-size: 13px;">
                            <?php echo e($teacher->phone ?? '-'); ?>

                        </td>
                        <td class="fw-semibold text-dark" style="font-size: 13px;">
                            Rs. <?php echo e(number_format($teacher->salary, 0)); ?>

                        </td>
                        <td>
                            <span class="badge <?php echo e($teacher->status == 'Active' ? 'badge-active' : 'badge-inactive'); ?> px-2 py-1">
                                <?php echo e($teacher->status); ?>

                            </span>
                        </td>
                        <td class="text-end">
                            <div class="btn-group btn-group-sm">
                                <a href="<?php echo e(route('teachers.show', $teacher)); ?>" class="btn btn-light border text-primary" title="View Profile">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="<?php echo e(route('teachers.edit', $teacher)); ?>" class="btn btn-light border text-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="<?php echo e(route('teachers.destroy', $teacher)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this teacher record?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-light border text-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-person-badge fs-1 d-block mb-2 text-secondary"></i>
                            <h5>No Teachers Found</h5>
                            <p class="text-muted small">No faculty members found in the records.</p>
                            <a href="<?php echo e(route('teachers.create')); ?>" class="btn btn-primary btn-sm">Add First Teacher</a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if($teachers->hasPages()): ?>
        <div class="p-3 border-top">
            <?php echo e($teachers->links()); ?>

        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\xampp\htdocs\laravelproject\school-management\resources\views/teachers/index.blade.php ENDPATH**/ ?>