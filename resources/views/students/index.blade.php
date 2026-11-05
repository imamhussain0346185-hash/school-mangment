@extends('layouts.admin')

@section('title', 'Students Directory - School Management')
@section('page-title', 'Students Directory')

@section('content')
<div class="custom-card mb-4">
    <div class="p-3 border-bottom d-flex flex-wrap justify-content-between align-items-center gap-3">
        <!-- Search & Filter Form -->
        <form method="GET" action="{{ route('students.index') }}" class="d-flex flex-wrap align-items-center gap-2 flex-grow-1" style="max-width: 600px;">
            <div class="input-group" style="max-width: 320px;">
                <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                <input type="text" name="search" value="{{ request('search') }}" class="form-control border-start-0" placeholder="Search by name, roll no, phone...">
            </div>

            <select name="class_name" class="form-select" style="max-width: 160px;" onchange="this.form.submit()">
                <option value="">All Classes</option>
                @foreach($classes as $c)
                    <option value="{{ $c->name }}" {{ request('class_name') == $c->name ? 'selected' : '' }}>{{ $c->name }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-secondary btn-sm">Filter</button>
            @if(request('search') || request('class_name'))
                <a href="{{ route('students.index') }}" class="btn btn-outline-secondary btn-sm">Clear</a>
            @endif
        </form>

        <a href="{{ route('students.create') }}" class="btn btn-primary">
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
                @forelse($students as $student)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle bg-light border d-flex align-items-center justify-content-center text-primary fw-bold" style="width: 38px; height: 38px;">
                                    {{ strtoupper(substr($student->name, 0, 1)) }}
                                </div>
                                <div>
                                    <a href="{{ route('students.show', $student) }}" class="fw-bold text-dark text-decoration-none">
                                        {{ $student->name }}
                                    </a>
                                    <div class="text-muted" style="font-size: 12px;">{{ $student->gender ?? 'Student' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="text-secondary" style="font-size: 13px;">
                            {{ $student->father_name ?? '-' }}
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">{{ $student->admission_number ?? 'N/A' }}</span>
                            @if($student->roll_no)
                                <div class="text-muted" style="font-size: 11px;">Roll: {{ $student->roll_no }}</div>
                            @endif
                        </td>
                        <td>
                            <span class="fw-medium text-dark">{{ $student->class_name ?? 'Class' }}</span>
                            <small class="text-muted">({{ $student->section ?? 'A' }})</small>
                        </td>
                        <td style="font-size: 13px;">
                            {{ $student->phone ?? $student->guardian_phone ?? '-' }}
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
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('students.show', $student) }}" class="btn btn-light border text-primary" title="View Profile">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('students.edit', $student) }}" class="btn btn-light border text-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this student record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-light border text-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="bi bi-people fs-1 d-block mb-2 text-secondary"></i>
                            <h5>No Students Found</h5>
                            <p class="text-muted small">No student matches your search or none registered yet.</p>
                            <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">Enroll New Student</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($students->hasPages())
        <div class="p-3 border-top">
            {{ $students->links() }}
        </div>
    @endif
</div>
@endsection
