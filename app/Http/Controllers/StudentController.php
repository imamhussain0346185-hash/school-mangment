<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('roll_no', 'like', "%{$search}%")
                  ->orWhere('admission_number', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('father_name', 'like', "%{$search}%");
            });
        }

        if ($request->filled('class_name')) {
            $query->where('class_name', $request->class_name);
        }

        $students = $query->latest()->paginate(10)->withQueryString();
        $classes = SchoolClass::select('name')->distinct()->get();

        return view('students.index', compact('students', 'classes'));
    }

    public function create()
    {
        $classes = SchoolClass::all();
        return view('students.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'admission_number' => 'nullable|string|max:255|unique:students,admission_number',
            'roll_no' => 'nullable|string|max:255',
            'class_id' => 'nullable|exists:school_classes,id',
            'class_name' => 'nullable|string|max:255',
            'section' => 'nullable|string|max:10',
            'father_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'gender' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'monthly_fee' => 'nullable|numeric|min:0',
            'status' => 'required|string|in:Active,Inactive,Graduated',
            'address' => 'nullable|string|max:500',
        ]);

        if (empty($validated['admission_number'])) {
            $validated['admission_number'] = 'ADM-' . date('Y') . '-' . str_pad(Student::max('id') + 1, 4, '0', STR_PAD_LEFT);
        }

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student successfully enrolled!');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $classes = SchoolClass::all();
        return view('students.edit', compact('student', 'classes'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'admission_number' => 'nullable|string|max:255|unique:students,admission_number,' . $student->id,
            'roll_no' => 'nullable|string|max:255',
            'class_id' => 'nullable|exists:school_classes,id',
            'class_name' => 'nullable|string|max:255',
            'section' => 'nullable|string|max:10',
            'father_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'gender' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'monthly_fee' => 'nullable|numeric|min:0',
            'status' => 'required|string|in:Active,Inactive,Graduated',
            'address' => 'nullable|string|max:500',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student details updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student record deleted successfully.');
    }
}
