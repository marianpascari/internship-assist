<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createStudent()
    {
        return view('createstudent');
    }

    public function createProfessor()
    {
        return view('createprofessor');
    }

    public function storeStudent(Request $request)
    {
        $user = new User();
        $student = new Student();

        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('email'));
        $user->role = 'student';
        $user->save();

        $student->user_id = $user->id;
        $student->professor_id = $request->get('professor_id');
        $student->first_name = $request->get('first_name');
        $student->last_name = $request->get('last_name');
        $student->faculty = $request->get('faculty');
        $student->specialization = $request->get('specialization');
        $student->cnp = $request->get('cnp');
        $student->save();
    }
}
