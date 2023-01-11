<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Score;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $student = Student::count();
        $subject = Subject::count();
        $data = Score::where('nilai')->count();
        return view('Data.Dashboard')->with([
            'student' => $student,
            'subject' => $subject,
            'data' => $data
        ]);
    }
}
