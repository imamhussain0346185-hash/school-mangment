@extends('layouts.admin')

@section('title', 'Teacher Profile - ' . $teacher->name)
@section('page-title', 'Teacher Profile')

@section('content')
<div class="custom-card mb-4" style="max-width: 850px; margin: 0 auto;">
    <!-- Profile Header Banner -->
    <div class="p-4 bg-light border-bottom d-flex flex-wrap justify-content-between align-items-center gap-3">
        <div class="d-flex align-items-center gap-3">
            <div class="rounded-circle bg-emerald-soft text-success d-flex align-items-center justify-content-center fw-bold fs-2 shadow-sm" style="width: 70px; height: 70px;">
                <i class="bi bi-person-fill"></i>
            </div>
            <div>
                <h4 class="fw-bold m-0 text-dark">{{ $teacher->name }}</h4>
                <div class="text-muted d-flex align-items-center gap-2 mt-1">
                    <span class="badge bg-primary">{{ $teacher->subject }}</span>
                    <span>•</span>
                    <span>{{ $teacher->designation ?? 'Faculty Member' }}</span>
                    <span>•</span>
                    <span class="badge {{ $teacher->status == 'Active' ? 'badge-active' : 'badge-inactive' }}">{{ $teacher->status }}</span>
                </div>
            </div>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil me-1"></i> Edit Profile
            </a>
            <a href="{{ route('teachers.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Back
            </a>
        </div>
    </div>

    <!-- Profile Details Body -->
    <div class="p-4">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-white h-100">
                    <h6 class="fw-bold text-primary mb-3 border-bottom pb-2">
                        <i class="bi bi-briefcase me-1"></i> Professional Details
                    </h6>
                    <table class="table table-sm table-borderless m-0">
                        <tr>
                            <th class="text-muted w-50">Teaching Subject:</th>
                            <td class="fw-bold text-dark">{{ $teacher->subject }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Qualification:</th>
                            <td class="fw-bold text-dark">{{ $teacher->qualification ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Designation:</th>
                            <td>{{ $teacher->designation ?? 'Teacher' }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Salary:</th>
                            <td class="fw-bold text-success">Rs. {{ number_format($teacher->salary, 0) }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Joining Date:</th>
                            <td>{{ $teacher->joining_date ? date('d M Y', strtotime($teacher->joining_date)) : '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-white h-100">
                    <h6 class="fw-bold text-primary mb-3 border-bottom pb-2">
                        <i class="bi bi-telephone me-1"></i> Contact & Personal
                    </h6>
                    <table class="table table-sm table-borderless m-0">
                        <tr>
                            <th class="text-muted w-50">Phone:</th>
                            <td class="fw-bold text-dark">{{ $teacher->phone ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Email:</th>
                            <td>{{ $teacher->email ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Gender:</th>
                            <td>{{ $teacher->gender ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted">CNIC:</th>
                            <td>{{ $teacher->cnic ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Address:</th>
                            <td>{{ $teacher->address ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
