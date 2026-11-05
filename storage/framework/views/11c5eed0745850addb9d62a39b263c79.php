

<?php $__env->startSection('title', 'Admin Dashboard - School Management'); ?>
<?php $__env->startSection('page-title', 'School Overview & Analytics'); ?>

<?php $__env->startSection('content'); ?>
<div class="row g-4 mb-4">
    <!-- Stat 1: Students -->
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted fw-semibold" style="font-size: 13px;">TOTAL STUDENTS</span>
                    <h3 class="fw-bold my-1 text-dark"><?php echo e($totalStudents); ?></h3>
                    <span class="badge bg-emerald-soft" style="font-size: 11px;">
                        <i class="bi bi-check2-circle me-1"></i> <?php echo e($activeStudents); ?> Active Students
                    </span>
                </div>
                <div class="stat-icon-wrapper bg-blue-soft">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Stat 2: Teachers -->
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted fw-semibold" style="font-size: 13px;">FACULTY & TEACHERS</span>
                    <h3 class="fw-bold my-1 text-dark"><?php echo e($totalTeachers); ?></h3>
                    <span class="badge bg-blue-soft" style="font-size: 11px;">
                        <i class="bi bi-person-check me-1"></i> Qualified Teachers
                    </span>
                </div>
                <div class="stat-icon-wrapper bg-emerald-soft">
                    <i class="bi bi-person-badge-fill"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Stat 3: Classes -->
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted fw-semibold" style="font-size: 13px;">CLASSES & SECTIONS</span>
                    <h3 class="fw-bold my-1 text-dark"><?php echo e($totalClasses); ?></h3>
                    <span class="badge bg-purple-soft" style="font-size: 11px;">
                        <i class="bi bi-building me-1"></i> Academic Grades
                    </span>
                </div>
                <div class="stat-icon-wrapper bg-purple-soft">
                    <i class="bi bi-door-open-fill"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Stat 4: Expected Monthly Fee -->
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted fw-semibold" style="font-size: 13px;">MONTHLY FEE REVENUE</span>
                    <h3 class="fw-bold my-1 text-dark">Rs. <?php echo e(number_format($monthlyFeeExpected, 0)); ?></h3>
                    <span class="badge bg-amber-soft" style="font-size: 11px;">
                        <i class="bi bi-cash-coin me-1"></i> Projected Inflow
                    </span>
                </div>
                <div class="stat-icon-wrapper bg-amber-soft">
                    <i class="bi bi-wallet-fill"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Row -->
<div class="row g-4">
    <!-- Recent Students Table -->
    <div class="col-lg-8">
        <div class="custom-card">
            <div class="custom-card-header">
                <div>
                    <h6 class="m-0 fw-bold text-dark">Recent Student Admissions</h6>
                    <small class="text-muted">Latest registered students from database</small>
                </div>
                <a href="<?php echo e(route('students.index')); ?>" class="btn btn-sm btn-outline-primary">
                    View All Students <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle m-0">
                    <thead class="table-light">
                        <tr style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">
                            <th>Student</th>
                            <th>Roll / Adm No</th>
                            <th>Class & Sec</th>
                            <th>Fee</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $recentStudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-circle bg-light border d-flex align-items-center justify-content-center text-primary fw-bold" style="width: 36px; height: 36px; font-size: 13px;">
                                            <?php echo e(strtoupper(substr($student->name, 0, 1))); ?>

                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark" style="font-size: 14px;"><?php echo e($student->name); ?></div>
                                            <small class="text-muted" style="font-size: 12px;"><?php echo e($student->father_name ?? 'N/A'); ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-medium text-secondary" style="font-size: 13px;"><?php echo e($student->roll_no ?? '-'); ?></span><br>
                                    <small class="text-muted" style="font-size: 11px;"><?php echo e($student->admission_number ?? ''); ?></small>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">
                                        <?php echo e($student->class_name ?? 'Class'); ?> (<?php echo e($student->section ?? 'A'); ?>)
                                    </span>
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
                                    <a href="<?php echo e(route('students.show', $student)); ?>" class="btn btn-sm btn-light border text-primary" title="View Profile">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    No students found. <a href="<?php echo e(route('students.create')); ?>">Enroll first student</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Teachers List -->
    <div class="col-lg-4">
        <div class="custom-card">
            <div class="custom-card-header">
                <div>
                    <h6 class="m-0 fw-bold text-dark">Faculty Members</h6>
                    <small class="text-muted">Assigned teachers list</small>
                </div>
                <a href="<?php echo e(route('teachers.index')); ?>" class="btn btn-sm btn-outline-secondary">
                    All <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="p-3">
                <?php $__empty_1 = true; $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="d-flex align-items-center justify-content-between p-2 rounded hover-bg mb-2 border-bottom border-light">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle bg-emerald-soft text-success d-flex align-items-center justify-content-center fw-bold" style="width: 40px; height: 40px;">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div>
                                <div class="fw-bold text-dark" style="font-size: 14px;"><?php echo e($teacher->name); ?></div>
                                <div class="text-muted" style="font-size: 12px;">
                                    <span class="badge bg-light text-primary border me-1"><?php echo e($teacher->subject); ?></span>
                                    <span><?php echo e($teacher->qualification ?? ''); ?></span>
                                </div>
                            </div>
                        </div>
                        <span class="badge badge-active" style="font-size: 10px;"><?php echo e($teacher->status); ?></span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-center py-4 text-muted">
                        No teachers recorded yet.
                    </div>
                <?php endif; ?>

                <div class="mt-3">
                    <a href="<?php echo e(route('teachers.create')); ?>" class="btn btn-outline-primary btn-sm w-100">
                        <i class="bi bi-plus-lg me-1"></i> Add New Faculty
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\xampp\htdocs\laravelproject\school-management\resources\views/dashboard.blade.php ENDPATH**/ ?>