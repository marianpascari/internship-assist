<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createStudent()
    {
        $professors = Professor::all();

        return view('createstudent', [
            'professors' => $professors
        ]);
    }

    public function createProfessor()
    {
        return view('createprofessor');
    }

    public function createAdmin()
    {
        return view('createadmin');
    }

    public function storeStudent(Request $request)
    {
        $user = new User();
        $student = new Student();

        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
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

        return redirect()->route('dashboard.users')->with('succes', 'Student adaugat!');
    }

    public function storeProfessor(Request $request)
    {
        $user = new User();
        $professor = new Professor();

        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->role = 'professor';
        $user->save();

        $professor->user_id = $user->id;
        $professor->first_name = $request->get('first_name');
        $professor->last_name = $request->get('last_name');
        $professor->faculty = $request->get('faculty');
        $professor->cnp = $request->get('cnp');
        $professor->save();

        return redirect()->route('dashboard.users')->with('succes', 'Profesor adaugat!');
    }

    public function storeAdmin(Request $request)
    {
        $user = new User();

        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->role = 'administrator';
        $user->save();

        return redirect()->route('dashboard.users')->with('succes', 'Admin adaugat!');
    }

    public function deleteStudent(Request $request)
    {
        $id = $request->get('deleteId');

        $student = Student::findorfail($id);
        $user = User::findorfail($student->user_id);

        $user->delete();
        $student->delete();

        return redirect()->route('dashboard.users')->with('succes', 'Student sters!');
    }

    public function deleteProfessor(Request $request)
    {
        $id = $request->get('deleteId');

        $professor = Professor::findorfail($id);
        $user = User::findorfail($professor->user_id);

        $user->delete();
        $professor->delete();

        return redirect()->route('dashboard.users')->with('succes', 'Profesor sters!');
    }

    public function deleteAdmin(Request $request)
    {
        $id = $request->get('deleteId');
        $user = User::findorfail($id);
        $user->delete();

        return redirect()->route('dashboard.users')->with('succes', 'Admin sters!');
    }
}
