<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessorController extends Controller
{
    public function getMyStudents()
    {
        $id = Auth::user()->professor->id;
        $students = Student::where('professor_id', $id)->get();

        return view('mystudents', [
            'students' => $students
        ]);
    }

    public function viewStudentProfile(Request $request)
    {
        $studentId = $request->get('studentId');
        $student = Student::findOrFail($studentId);

        return view('studentprofile', [
            'student' => $student
        ]);

    }
}
