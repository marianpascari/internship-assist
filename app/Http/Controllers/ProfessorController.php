<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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

    public function getMailPage(Request $request)
    {
        $studentId = $request->get('studentId');
        $student = Student::findOrFail($studentId);

        return view('mailpage', [
            'student' => $student
        ]);
    }

    public function viewStudentProject(Request $request)
    {
        $filename = $request->get('projectFilename');
        $path = storage_path('app/public/' . $filename);

        return response()->file($path);
    }

    public function sendMail(Request $request)
    {
        $studentId = $request->get('studentId');
        $student = Student::findOrFail($studentId);

        $mailsubject = $request->get('subject');
        $mailbody = $request->get('body');

        $data = ['body' => $mailbody];
        $user['to'] = $student->user->email;
        Mail::send('mail', $data, function($messages) use ($user, $mailsubject){
            $messages->to($user['to']);
            $messages->subject($mailsubject);
        });

        return redirect()->route('dashboard.mystudents');
    }

    public function acceptRequest(Request $request)
    {
        $requestId = $request->get('requestId');
        $thisRequest = \App\Models\Request::findorfail($requestId);
        $thisRequest->status = 2;
        $thisRequest->save();

        return redirect()->route('dashboard.mystudents');
    }

    public function declineRequest(Request $request)
    {
        $requestId = $request->get('requestId');
        $thisRequest = \App\Models\Request::findorfail($requestId);
        Storage::delete('public/' . $thisRequest->filename);
        Storage::delete('public/' . $thisRequest->project_filename);
        $thisRequest->delete();

        return redirect()->route('dashboard.mystudents');
    }

}
