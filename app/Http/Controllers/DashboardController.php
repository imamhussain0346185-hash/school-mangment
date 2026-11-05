<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();
        $activeStudents = Student::where('status', 'Active')->count();
        $totalTeachers = Teacher::count();
        $totalClasses = SchoolClass::count();
        
        $recentStudents = Student::latest()->take(5)->get();
        $teachers = Teacher::latest()->take(5)->get();

        // Calculate total monthly fee collection expectation
        $monthlyFeeExpected = Student::where('status', 'Active')->sum('monthly_fee');

        return view('dashboard', compact(
            'totalStudents',
            'activeStudents',
            'totalTeachers',
            'totalClasses',
            'recentStudents',
            'teachers',
            'monthlyFeeExpected'
        ));
    }
}
