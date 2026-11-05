@extends('layouts.admin')

@section('title', 'Add Faculty Member - School Management')
@section('page-title', 'Register New Teacher')

@section('content')
<div class="custom-card mb-4" style="max-width: 900px; margin: 0 auto;">
    <div class="custom-card-header">
        <div>
            <h6 class="m-0 fw-bold text-dark">Teacher Information</h6>
            <small class="text-muted">Fill out faculty details for registration</small>
        </div>
        <a href="{{ route('teachers.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Faculty List
        </a>
    </div>

    <form method="POST" action="{{ route('teachers.store') }}" class="p-4">
        @csrf

        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Teacher Full Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="e.g. Prof. Tariq Ahmad" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold">Teaching Subject <span class="text-danger">*</span></label>
                <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" placeholder="e.g. Mathematics, Physics" required>
                @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Qualification</label>
                <input type="text" name="qualification" class="form-control" value="{{ old('qualification') }}" placeholder="e.g. MSc Mathematics, B.Ed">
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Designation</label>
                <input type="text" name="designation" class="form-control" value="{{ old('designation', 'Senior Teacher') }}" placeholder="e.g. Senior Teacher">
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Monthly Salary (PKR)</label>
                <input type="number" step="0.01" name="salary" class="form-control" value="{{ old('salary', 0) }}" placeholder="e.g. 45000">
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Phone Number</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="e.g. 03451234567">
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Email Address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="teacher@school.com">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Gender</label>
                <select name="gender" class="form-select">
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Employment Status</label>
                <select name="status" class="form-select">
                    <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="On Leave" {{ old('status') == 'On Leave' ? 'selected' : '' }}>On Leave</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Joining Date</label>
                <input type="date" name="joining_date" class="form-control" value="{{ old('joining_date') }}">
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold">Residential Address</label>
                <textarea name="address" rows="2" class="form-control" placeholder="Complete address...">{{ old('address') }}</textarea>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2 pt-3 border-top">
            <a href="{{ route('teachers.index') }}" class="btn btn-light border px-4">Cancel</a>
            <button type="submit" class="btn btn-primary px-4">
                <i class="bi bi-check-lg me-1"></i> Save Teacher
            </button>
        </div>
    </form>
</div>
@endsection
