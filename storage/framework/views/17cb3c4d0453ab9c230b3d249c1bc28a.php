

<?php $__env->startSection('title', 'Students Directory - School Management'); ?>
<?php $__env->startSection('page-title', 'Students Directory'); ?>

<?php $__env->startSection('content'); ?>
<div class="custom-card mb-4">
    <div class="p-3 border-bottom d-flex flex-wrap justify-content-between align-items-center gap-3">
        <!-- Search & Filter Form -->
        <form method="GET" action="<?php echo e(route('students.index')); ?>" class="d-flex flex-wrap align-items-center gap-2 flex-grow-1" style="max-width: 600px;">
            <div class="input-group" style="max-width: 320px;">
                <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                <input type="text" name="search" value="<?php echo e(request('search')); ?>" class="form-control border-start-0" placeholder="Search by name, roll no, phone...">
            </div>

            <select name="class_name" class="form-select" style="max-width: 160px;" onchange="this.form.submit()">
                <option value="">All Classes</option>
                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($c->name); ?>" <?php echo e(request('class_name') == $c->name ? 'selected' : ''); ?>><?php echo e($c->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <button type="submit" class="btn btn-secondary btn-sm">Filter</button>
            <?php if(request('search') || request('class_name')): ?>
                <a href="<?php echo e(route('students.index')); ?>" class="btn btn-outline-secondary btn-sm">Clear</a>
            <?php endif; ?>
        </form>

        <a href="<?php echo e(route('students.create')); ?>" class="btn btn-primary">
            <i class="bi bi-person-plus-fill me-1"></i> New Student Admission
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle m-0">
            <thead class="table-light">
                <tr style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">
                    <th>Student Info</th>
                    <th>Father Name</th>
                    <th>Adm / Roll No</th>
                    <th>Class</th>
                    <th>Contact</th>
                    <th>Fee</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle bg-light border d-flex align-items-center justify-content-center text-primary fw-bold" style="width: 38px; height: 38px;">
                                    <?php echo e(strtoupper(substr($student->name, 0, 1))); ?>

                                </div>
                                <div>
                                    <a href="<?php echo e(route('students.show', $student)); ?>" class="fw-bold text-dark text-decoration-none">
                                        <?php echo e($student->name); ?>

                                    </a>
                                    <div class="text-muted" style="font-size: 12px;"><?php echo e($student->gender ?? 'Student'); ?></div>
                                </div>
                            </div>
                        </td>
                        <td class="text-secondary" style="font-size: 13px;">
                            <?php echo e($student->father_name ?? '-'); ?>

                        </td>
                        <td>
                            <span class="badge bg-light text-dark border"><?php echo e($student->admission_number ?? 'N/A'); ?></span>
                            <?php if($student->roll_no): ?>
                                <div class="text-muted" style="font-size: 11px;">Roll: <?php echo e($student->roll_no); ?></div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <span class="fw-medium text-dark"><?php echo e($student->class_name ?? 'Class'); ?></span>
                            <small class="text-muted">(<?php echo e($student->section ?? 'A'); ?>)</small>
                        </td>
                        <td style="font-size: 13px;">
                            <?php echo e($student->phone ?? $student->guardian_phone ?? '-'); ?>

                        </td>
                        <td class="fw-semibold text-dark" style="font-size: 13px;">
                            Rs. <?php echo e(number_format($student->monthly_fee, 0)); ?>

                        </td>
                        <td>
                            <span class="badge <?php echo e($student->status == 'Active' ? 'badge-active' : 'badge-inactive'); ?> px-2 py-1">
                                <?php echo e($student->status); ?>

                            </span>
                        </td>
                        <td class="text-end">
                            <div class="btn-group btn-group-sm">
                                <a href="<?php echo e(route('students.show', $student)); ?>" class="btn btn-light border text-primary" title="View Profile">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="<?php echo e(route('students.edit', $student)); ?>" class="btn btn-light border text-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="<?php echo e(route('students.destroy', $student)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this student record?');">
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
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="bi bi-people fs-1 d-block mb-2 text-secondary"></i>
                            <h5>No Students Found</h5>
                            <p class="text-muted small">No student matches your search or none registered yet.</p>
                            <a href="<?php echo e(route('students.create')); ?>" class="btn btn-primary btn-sm">Enroll New Student</a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if($students->hasPages()): ?>
        <div class="p-3 border-top">
            <?php echo e($students->links()); ?>

        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\xampp\htdocs\laravelproject\school-management\resources\views/students/index.blade.php ENDPATH**/ ?>