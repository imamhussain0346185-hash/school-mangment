<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'School Management System'); ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --sidebar-bg: #0f172a;
            --sidebar-hover: #1e293b;
            --sidebar-active: #3b82f6;
            --body-bg: #f8fafc;
            --card-border: #e2e8f0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--body-bg);
            color: #334155;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 260px;
            background-color: var(--sidebar-bg);
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: all 0.3s ease;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.05);
        }

        .sidebar-brand {
            padding: 24px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            color: #fff;
            text-decoration: none;
        }

        .sidebar-brand-icon {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .sidebar-menu {
            padding: 20px 12px;
            list-style: none;
            margin: 0;
        }

        .menu-header {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #64748b;
            font-weight: 700;
            padding: 12px 14px 6px;
        }

        .nav-item {
            margin-bottom: 4px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 16px;
            color: #94a3b8;
            border-radius: 8px;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.2s ease;
        }

        .nav-link i {
            font-size: 18px;
        }

        .nav-link:hover {
            color: #f8fafc;
            background-color: var(--sidebar-hover);
        }

        .nav-link.active {
            color: #ffffff;
            background-color: var(--sidebar-active);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.35);
        }

        /* Main Content Wrapper */
        .main-wrapper {
            margin-left: 260px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Top Navbar */
        .top-navbar {
            background-color: #ffffff;
            border-bottom: 1px solid var(--card-border);
            padding: 16px 32px;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        /* Cards & Components */
        .content-container {
            padding: 32px;
            flex: 1;
        }

        .stat-card {
            background: #ffffff;
            border: 1px solid var(--card-border);
            border-radius: 14px;
            padding: 22px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
        }

        .stat-icon-wrapper {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .bg-blue-soft { background: #eff6ff; color: #2563eb; }
        .bg-emerald-soft { background: #ecfdf5; color: #059669; }
        .bg-purple-soft { background: #faf5ff; color: #9333ea; }
        .bg-amber-soft { background: #fffbeb; color: #d97706; }

        .custom-card {
            background: #ffffff;
            border: 1px solid var(--card-border);
            border-radius: 14px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
            overflow: hidden;
        }

        .custom-card-header {
            padding: 18px 24px;
            border-bottom: 1px solid var(--card-border);
            background: #ffffff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .badge-active { background-color: #dcfce7; color: #15803d; }
        .badge-inactive { background-color: #fee2e2; color: #b91c1c; }
        .badge-leave { background-color: #fef3c7; color: #b45309; }

        .table > :not(caption) > * > * {
            padding: 14px 18px;
            vertical-align: middle;
        }

        .btn-primary {
            background: #3b82f6;
            border-color: #3b82f6;
            font-weight: 600;
            border-radius: 8px;
            padding: 9px 18px;
        }

        .btn-primary:hover {
            background: #2563eb;
            border-color: #2563eb;
        }

        .form-control, .form-select {
            border-radius: 8px;
            border-color: #cbd5e1;
            padding: 10px 14px;
        }

        .form-control:focus, .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }
    </style>
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <a href="<?php echo e(route('dashboard')); ?>" class="sidebar-brand">
            <div class="sidebar-brand-icon">
                <i class="bi bi-mortarboard-fill"></i>
            </div>
            <div>
                <h6 class="m-0 fw-bold text-white tracking-wide">School Portal</h6>
                <small class="text-slate-400" style="font-size: 11px; color: #94a3b8;">Admin Management</small>
            </div>
        </a>

        <ul class="sidebar-menu">
            <li class="menu-header">Main Menu</li>
            <li class="nav-item">
                <a href="<?php echo e(route('dashboard')); ?>" class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Academic Management</li>
            <li class="nav-item">
                <a href="<?php echo e(route('students.index')); ?>" class="nav-link <?php echo e(request()->routeIs('students.*') ? 'active' : ''); ?>">
                    <i class="bi bi-people-fill"></i>
                    <span>Students</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('teachers.index')); ?>" class="nav-link <?php echo e(request()->routeIs('teachers.*') ? 'active' : ''); ?>">
                    <i class="bi bi-person-badge-fill"></i>
                    <span>Teachers</span>
                </a>
            </li>

            <li class="menu-header">Quick Actions</li>
            <li class="nav-item">
                <a href="<?php echo e(route('students.create')); ?>" class="nav-link">
                    <i class="bi bi-person-plus-fill"></i>
                    <span>New Admission</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('teachers.create')); ?>" class="nav-link">
                    <i class="bi bi-person-workspace"></i>
                    <span>Add Teacher</span>
                </a>
            </li>

            <li class="menu-header">System</li>
            <li class="nav-item">
                <form method="POST" action="<?php echo e(route('logout')); ?>" id="logout-form">
                    <?php echo csrf_field(); ?>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link text-danger">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </a>
                </form>
            </li>
        </ul>
    </aside>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Top Navbar -->
        <header class="top-navbar d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <h5 class="m-0 fw-bold text-dark"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h5>
                <span class="badge bg-light text-secondary border px-2 py-1" style="font-size: 11px;">
                    <i class="bi bi-calendar-check me-1"></i> <?php echo e(date('l, d M Y')); ?>

                </span>
            </div>

            <div class="d-flex align-items-center gap-3">
                <a href="<?php echo e(route('students.create')); ?>" class="btn btn-sm btn-primary">
                    <i class="bi bi-plus-lg me-1"></i> Enroll Student
                </a>
                <div class="d-flex align-items-center gap-2 border-start ps-3">
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; font-weight: 700; font-size: 14px;">
                        <?php echo e(strtoupper(substr(Auth::user()->name ?? 'A', 0, 1))); ?>

                    </div>
                    <div class="d-none d-md-block text-start">
                        <div class="fw-bold" style="font-size: 13px; line-height: 1.2;"><?php echo e(Auth::user()->name ?? 'Admin User'); ?></div>
                        <small class="text-muted" style="font-size: 11px;">Principal / Admin</small>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content Area -->
        <main class="content-container">
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
                    <i class="bi bi-check-circle-fill fs-5"></i>
                    <div><?php echo e(session('success')); ?></div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                    <div><?php echo e(session('error')); ?></div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <!-- Bootstrap 5.3 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH E:\xampp\htdocs\laravelproject\school-management\resources\views/layouts/admin.blade.php ENDPATH**/ ?>