<?php

namespace App\Http\Controllers;

use App\Models\Majors;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = [
            'students' => Student::with('majors')->get(),
            'totalMajors' => Majors::count(),
            'activeStudents' => Student::where('status', 'active')->count(),
            'studentsByMajor' => Student::groupBy('major_id')
                ->selectRaw('major_id, count(*) as total')
                ->with('majors')
                ->get()
        ];

        return view('dashboard' ,$data);
    }
}
