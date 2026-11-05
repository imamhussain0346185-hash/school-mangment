@extends('layouts.admin')

@section('title', 'Student Profile - ' . $student->name)
@section('page-title', 'Student Profile')

@section('content')
<div class="custom-card mb-4" style="max-width: 960px; margin: 0 auto;">
    <!-- Profile Header Banner -->
    <div class="p-4 bg-light border-bottom d-flex flex-wrap justify-content-between align-items-center gap-3">
        <div class="d-flex align-items-center gap-3">
            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold fs-2 shadow-sm" style="width: 70px; height: 70px;">
                {{ strtoupper(substr($student->name, 0, 1)) }}
            </div>
            <div>
                <h4 class="fw-bold m-0 text-dark">{{ $student->name }}</h4>
                <div class="text-muted d-flex align-items-center gap-2 mt-1">
                    <span class="badge bg-secondary">Adm: {{ $student->admission_number ?? 'N/A' }}</span>
                    <span>•</span>
                    <span>Class: <strong>{{ $student->class_name ?? 'N/A' }} ({{ $student->section ?? 'A' }})</strong></span>
                    <span>•</span>
                    <span class="badge {{ $student->status == 'Active' ? 'badge-active' : 'badge-inactive' }}">{{ $student->status }}</span>
                </div>
            </div>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('students.edit', $student) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil me-1"></i> Edit Profile
            </a>
            <a href="{{ route('students.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Back
            </a>
        </div>
    </div>

    <!-- Profile Details Body -->
    <div class="p-4">
        <div class="row g-4">
            <!-- Academic Information -->
            <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-white h-100">
                    <h6 class="fw-bold text-primary mb-3 border-bottom pb-2">
                        <i class="bi bi-mortarboard me-1"></i> Academic Record
                    </h6>
                    <table class="table table-sm table-borderless m-0">
                        <tr>
                            <th class="text-muted w-50">Class / Grade:</th>
                            <td class="fw-bold text-dark">{{ $student->class_name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Section:</th>
                            <td class="fw-bold text-dark">{{ $student->section ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Roll Number:</th>
                            <td class="fw-bold text-dark">{{ $student->roll_no ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Admission Number:</th>
                            <td class="fw-bold text-primary">{{ $student->admission_number ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Admission Date:</th>
                            <td>{{ $student->admission_date ? date('d M Y', strtotime($student->admission_date)) : '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Fee & Financial Info -->
            <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-white h-100">
                    <h6 class="fw-bold text-primary mb-3 border-bottom pb-2">
                        <i class="bi bi-cash-stack me-1"></i> Fee Structure
                    </h6>
                    <table class="table table-sm table-borderless m-0">
                        <tr>
                            <th class="text-muted w-50">Monthly Tuition Fee:</th>
                            <td class="fw-bold text-success fs-6">Rs. {{ number_format($student->monthly_fee, 0) }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Fee Category:</th>
                            <td>{{ $student->fee_category ?? 'Full Fee' }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Transport Fee:</th>
                            <td>Rs. {{ number_format($student->transport_fee ?? 0, 0) }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Discount Applied:</th>
                            <td>{{ $student->discount_percent ?? 0 }}%</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Personal & Contact Info -->
            <div class="col-12">
                <div class="p-3 border rounded-3 bg-white">
                    <h6 class="fw-bold text-primary mb-3 border-bottom pb-2">
                        <i class="bi bi-person-lines-fill me-1"></i> Personal & Family Details
                    </h6>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <small class="text-muted d-block">Father / Guardian</small>
                            <span class="fw-semibold text-dark">{{ $student->father_name ?? '-' }}</span>
                        </div>
                        <div class="col-md-4">
                            <small class="text-muted d-block">Contact Phone</small>
                            <span class="fw-semibold text-dark">{{ $student->phone ?? '-' }}</span>
                        </div>
                        <div class="col-md-4">
                            <small class="text-muted d-block">Emergency Phone</small>
                            <span class="fw-semibold text-dark">{{ $student->emergency_contact ?? '-' }}</span>
                        </div>
                        <div class="col-md-4">
                            <small class="text-muted d-block">Gender</small>
                            <span class="fw-semibold text-dark">{{ $student->gender ?? '-' }}</span>
                        </div>
                        <div class="col-md-4">
                            <small class="text-muted d-block">Date of Birth</small>
                            <span class="fw-semibold text-dark">{{ $student->dob ?? '-' }}</span>
                        </div>
                        <div class="col-md-4">
                            <small class="text-muted d-block">B-Form / CNIC</small>
                            <span class="fw-semibold text-dark">{{ $student->cnic_bform ?? '-' }}</span>
                        </div>
                        <div class="col-12">
                            <small class="text-muted d-block">Home Address</small>
                            <span class="fw-semibold text-dark">{{ $student->address ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
