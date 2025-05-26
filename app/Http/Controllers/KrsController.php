<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Student;
use App\Models\Subjects;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    public function index(Request $request)
    {
        $student = null;
        if ($request->has('search')) {
            $student = Student::where('student_id_number', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('name', 'LIKE', '%' . $request->search . '%')
                            ->first();
        }

        $krs = [];
        if ($student) {
            $krs = Krs::with(['student', 'subject'])
                     ->where('student_id', $student->id_student)
                     ->get();
        }

        return view('krs.index', compact('krs', 'student'));
    }

    public function create(Request $request)
    {
        $selectedStudent = null;
        if ($request->has('student_id')) {
            $selectedStudent = Student::find($request->student_id);
        }

        $students = Student::where('status', 'Active')->get();
        $subjects = Subjects::all();

        return view('krs.create', compact('students', 'subjects', 'selectedStudent'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id_student',
            'subject_id' => 'required|exists:subjects,id_subject',
            'semester' => 'required|in:1,2,3,4,5,6,7,8',
            'academic_year' => 'required',
        ]);

        Krs::create($validated);
        return redirect()->route('krs.index')->with('success', 'KRS created successfully');
    }
}
