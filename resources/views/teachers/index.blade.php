@extends('layouts.admin')

@section('title', 'Teachers Directory - School Management')
@section('page-title', 'Teachers & Faculty Directory')

@section('content')
<div class="custom-card mb-4">
    <div class="p-3 border-bottom d-flex flex-wrap justify-content-between align-items-center gap-3">
        <!-- Search Form -->
        <form method="GET" action="{{ route('teachers.index') }}" class="d-flex align-items-center gap-2 flex-grow-1" style="max-width: 450px;">
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                <input type="text" name="search" value="{{ request('search') }}" class="form-control border-start-0" placeholder="Search teacher by name, subject, phone...">
            </div>
            <button type="submit" class="btn btn-secondary btn-sm">Search</button>
            @if(request('search'))
                <a href="{{ route('teachers.index') }}" class="btn btn-outline-secondary btn-sm">Clear</a>
            @endif
        </form>

        <a href="{{ route('teachers.create') }}" class="btn btn-primary">
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
                @forelse($teachers as $teacher)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle bg-emerald-soft text-success d-flex align-items-center justify-content-center fw-bold" style="width: 38px; height: 38px;">
                                    {{ strtoupper(substr($teacher->name, 0, 1)) }}
                                </div>
                                <div>
                                    <a href="{{ route('teachers.show', $teacher) }}" class="fw-bold text-dark text-decoration-none">
                                        {{ $teacher->name }}
                                    </a>
                                    <div class="text-muted" style="font-size: 12px;">{{ $teacher->designation ?? 'Teacher' }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-primary border px-2 py-1 fs-7">
                                <i class="bi bi-book me-1"></i> {{ $teacher->subject }}
                            </span>
                        </td>
                        <td class="text-secondary" style="font-size: 13px;">
                            {{ $teacher->qualification ?? '-' }}
                        </td>
                        <td style="font-size: 13px;">
                            {{ $teacher->phone ?? '-' }}
                        </td>
                        <td class="fw-semibold text-dark" style="font-size: 13px;">
                            Rs. {{ number_format($teacher->salary, 0) }}
                        </td>
                        <td>
                            <span class="badge {{ $teacher->status == 'Active' ? 'badge-active' : 'badge-inactive' }} px-2 py-1">
                                {{ $teacher->status }}
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('teachers.show', $teacher) }}" class="btn btn-light border text-primary" title="View Profile">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-light border text-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('teachers.destroy', $teacher) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this teacher record?');">
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
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-person-badge fs-1 d-block mb-2 text-secondary"></i>
                            <h5>No Teachers Found</h5>
                            <p class="text-muted small">No faculty members found in the records.</p>
                            <a href="{{ route('teachers.create') }}" class="btn btn-primary btn-sm">Add First Teacher</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($teachers->hasPages())
        <div class="p-3 border-top">
            {{ $teachers->links() }}
        </div>
    @endif
</div>
@endsection
