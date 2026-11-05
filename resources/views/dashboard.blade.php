@extends('layouts.admin')

@section('title', 'Admin Dashboard - School Management')
@section('page-title', 'School Overview & Analytics')

@section('content')
<div class="row g-4 mb-4">
    <!-- Stat 1: Students -->
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted fw-semibold" style="font-size: 13px;">TOTAL STUDENTS</span>
                    <h3 class="fw-bold my-1 text-dark">{{ $totalStudents }}</h3>
                    <span class="badge bg-emerald-soft" style="font-size: 11px;">
                        <i class="bi bi-check2-circle me-1"></i> {{ $activeStudents }} Active Students
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
                    <h3 class="fw-bold my-1 text-dark">{{ $totalTeachers }}</h3>
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
                    <h3 class="fw-bold my-1 text-dark">{{ $totalClasses }}</h3>
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
                    <h3 class="fw-bold my-1 text-dark">Rs. {{ number_format($monthlyFeeExpected, 0) }}</h3>
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
                <a href="{{ route('students.index') }}" class="btn btn-sm btn-outline-primary">
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
                        @forelse($recentStudents as $student)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-circle bg-light border d-flex align-items-center justify-content-center text-primary fw-bold" style="width: 36px; height: 36px; font-size: 13px;">
                                            {{ strtoupper(substr($student->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark" style="font-size: 14px;">{{ $student->name }}</div>
                                            <small class="text-muted" style="font-size: 12px;">{{ $student->father_name ?? 'N/A' }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-medium text-secondary" style="font-size: 13px;">{{ $student->roll_no ?? '-' }}</span><br>
                                    <small class="text-muted" style="font-size: 11px;">{{ $student->admission_number ?? '' }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">
                                        {{ $student->class_name ?? 'Class' }} ({{ $student->section ?? 'A' }})
                                    </span>
                                </td>
                                <td class="fw-semibold text-dark" style="font-size: 13px;">
                                    Rs. {{ number_format($student->monthly_fee, 0) }}
                                </td>
                                <td>
                                    <span class="badge {{ $student->status == 'Active' ? 'badge-active' : 'badge-inactive' }} px-2 py-1">
                                        {{ $student->status }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-light border text-primary" title="View Profile">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    No students found. <a href="{{ route('students.create') }}">Enroll first student</a>
                                </td>
                            </tr>
                        @endforelse
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
                <a href="{{ route('teachers.index') }}" class="btn btn-sm btn-outline-secondary">
                    All <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="p-3">
                @forelse($teachers as $teacher)
                    <div class="d-flex align-items-center justify-content-between p-2 rounded hover-bg mb-2 border-bottom border-light">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle bg-emerald-soft text-success d-flex align-items-center justify-content-center fw-bold" style="width: 40px; height: 40px;">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div>
                                <div class="fw-bold text-dark" style="font-size: 14px;">{{ $teacher->name }}</div>
                                <div class="text-muted" style="font-size: 12px;">
                                    <span class="badge bg-light text-primary border me-1">{{ $teacher->subject }}</span>
                                    <span>{{ $teacher->qualification ?? '' }}</span>
                                </div>
                            </div>
                        </div>
                        <span class="badge badge-active" style="font-size: 10px;">{{ $teacher->status }}</span>
                    </div>
                @empty
                    <div class="text-center py-4 text-muted">
                        No teachers recorded yet.
                    </div>
                @endforelse

                <div class="mt-3">
                    <a href="{{ route('teachers.create') }}" class="btn btn-outline-primary btn-sm w-100">
                        <i class="bi bi-plus-lg me-1"></i> Add New Faculty
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
