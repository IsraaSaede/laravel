<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $teachers   = Teacher::count();
        $classrooms = Classroom::count();
        $students   = Student::count();

        return view('admin.dashboard', compact('teachers', 'classrooms', 'students'));
    }
}
