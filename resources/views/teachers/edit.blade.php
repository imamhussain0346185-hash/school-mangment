@extends('layouts.admin')

@section('title', 'Edit Teacher - ' . $teacher->name)
@section('page-title', 'Edit Faculty Profile')

@section('content')
<div class="custom-card mb-4" style="max-width: 900px; margin: 0 auto;">
    <div class="custom-card-header">
        <div>
            <h6 class="m-0 fw-bold text-dark">Update Faculty Information</h6>
            <small class="text-muted">Edit profile details for {{ $teacher->name }}</small>
        </div>
        <a href="{{ route('teachers.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Faculty List
        </a>
    </div>

    <form method="POST" action="{{ route('teachers.update', $teacher) }}" class="p-4">
        @csrf
        @method('PUT')

        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Teacher Full Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $teacher->name) }}" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold">Teaching Subject <span class="text-danger">*</span></label>
                <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject', $teacher->subject) }}" required>
                @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Qualification</label>
                <input type="text" name="qualification" class="form-control" value="{{ old('qualification', $teacher->qualification) }}">
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Designation</label>
                <input type="text" name="designation" class="form-control" value="{{ old('designation', $teacher->designation) }}">
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Monthly Salary (PKR)</label>
                <input type="number" step="0.01" name="salary" class="form-control" value="{{ old('salary', $teacher->salary) }}">
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Phone Number</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $teacher->phone) }}">
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Email Address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $teacher->email) }}">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Gender</label>
                <select name="gender" class="form-select">
                    <option value="Male" {{ old('gender', $teacher->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender', $teacher->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Employment Status</label>
                <select name="status" class="form-select">
                    <option value="Active" {{ old('status', $teacher->status) == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ old('status', $teacher->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="On Leave" {{ old('status', $teacher->status) == 'On Leave' ? 'selected' : '' }}>On Leave</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Joining Date</label>
                <input type="date" name="joining_date" class="form-control" value="{{ old('joining_date', $teacher->joining_date) }}">
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold">Residential Address</label>
                <textarea name="address" rows="2" class="form-control">{{ old('address', $teacher->address) }}</textarea>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2 pt-3 border-top">
            <a href="{{ route('teachers.index') }}" class="btn btn-light border px-4">Cancel</a>
            <button type="submit" class="btn btn-primary px-4">
                <i class="bi bi-check-lg me-1"></i> Update Faculty
            </button>
        </div>
    </form>
</div>
@endsection
