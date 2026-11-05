@extends('layouts.admin')

@section('title', 'New Student Admission - School Management')
@section('page-title', 'Student Admission Form')

@section('content')
<div class="custom-card mb-4" style="max-width: 960px; margin: 0 auto;">
    <div class="custom-card-header">
        <div>
            <h6 class="m-0 fw-bold text-dark">Enroll New Student</h6>
            <small class="text-muted">Enter complete details to create a student profile</small>
        </div>
        <a href="{{ route('students.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Directory
        </a>
    </div>

    <form method="POST" action="{{ route('students.store') }}" class="p-4">
        @csrf

        <!-- Section 1: Personal Info -->
        <h6 class="fw-bold text-primary mb-3"><i class="bi bi-person me-1"></i> 1. Personal Information</h6>
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Student Full Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="e.g. Ali Khan" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-3">
                <label class="form-label fw-semibold">Gender</label>
                <select name="gender" class="form-select">
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label fw-semibold">Date of Birth</label>
                <input type="date" name="dob" class="form-control" value="{{ old('dob') }}">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold">Father / Guardian Name</label>
                <input type="text" name="father_name" class="form-control" value="{{ old('father_name') }}" placeholder="e.g. Tariq Khan">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold">Contact / Phone Number</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="e.g. 03401234567">
            </div>
        </div>

        <hr class="my-4 text-muted">

        <!-- Section 2: Academic Info -->
        <h6 class="fw-bold text-primary mb-3"><i class="bi bi-mortarboard me-1"></i> 2. Academic Enrollment</h6>
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <label class="form-label fw-semibold">Class / Grade</label>
                <select name="class_name" class="form-select">
                    <option value="">Select Class</option>
                    @foreach($classes as $c)
                        <option value="{{ $c->name }}" {{ old('class_name') == $c->name ? 'selected' : '' }}>
                            {{ $c->name }} (Section {{ $c->section }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <label class="form-label fw-semibold">Section</label>
                <input type="text" name="section" class="form-control" value="{{ old('section', 'A') }}" placeholder="A">
            </div>

            <div class="col-md-3">
                <label class="form-label fw-semibold">Roll Number</label>
                <input type="text" name="roll_no" class="form-control" value="{{ old('roll_no') }}" placeholder="e.g. 101">
            </div>

            <div class="col-md-3">
                <label class="form-label fw-semibold">Admission Number</label>
                <input type="text" name="admission_number" class="form-control" value="{{ old('admission_number') }}" placeholder="Auto-generated if blank">
            </div>
        </div>

        <hr class="my-4 text-muted">

        <!-- Section 3: Fee & Account -->
        <h6 class="fw-bold text-primary mb-3"><i class="bi bi-cash-stack me-1"></i> 3. Fee & Status</h6>
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <label class="form-label fw-semibold">Monthly Tuition Fee (PKR)</label>
                <input type="number" step="0.01" name="monthly_fee" class="form-control" value="{{ old('monthly_fee', 0) }}" placeholder="e.g. 3000">
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Enrollment Status</label>
                <select name="status" class="form-select">
                    <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="Graduated" {{ old('status') == 'Graduated' ? 'selected' : '' }}>Graduated</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Email Address (Optional)</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="student@example.com">
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold">Residential Address</label>
                <textarea name="address" rows="2" class="form-control" placeholder="Complete address...">{{ old('address') }}</textarea>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2 pt-3 border-top">
            <a href="{{ route('students.index') }}" class="btn btn-light border px-4">Cancel</a>
            <button type="submit" class="btn btn-primary px-4">
                <i class="bi bi-check-lg me-1"></i> Save & Enroll Student
            </button>
        </div>
    </form>
</div>
@endsection
