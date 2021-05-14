<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function createRequest()
    {
        return view('createrequest');
    }

    public function storeRequest(Request $request)
    {
        $file = $request->file('uploadedFile');
        $projectFile = $request->file('projectFile');

        $finfo = finfo_open(FILEINFO_MIME_TYPE);

        if (finfo_file($finfo, $file) == "application/pdf" && finfo_file($finfo, $projectFile) == "application/pdf") {
            $filename = time() . $file->getClientOriginalName();
            $projectFilename = time() . $projectFile->getClientOriginalName();

            $path = $file->storeAs('public', $filename);
            $projectPath = $projectFile->storeAs('public', $projectFilename);

            $thisrequest = new \App\Models\Request();
            $thisrequest->title = $request->get('title');
            $thisrequest->student_id = Auth::user()->student->id;
            $thisrequest->filename = $filename;
            $thisrequest->project_filename = $projectFilename;
            $thisrequest->status = 1;
            $thisrequest->save();
        }

        return redirect()->route('dashboard.createrequest');
    }

    public function deleteRequest(Request $request)
    {
        $filename = Auth::user()->student->request->filename;
        $projectFilename = Auth::user()->student->request->project_filename;

        Storage::delete('public/' . $filename);
        Storage::delete('public/' . $projectFilename);

        Auth::user()->student->request->delete();

        return redirect()->route('dashboard');
    }

    public function showUpload()
    {
        $filename = Auth::user()->student->request->filename;
        $path = storage_path('app/public/' . $filename);

        return response()->file($path);
    }

    public function showProjectFile()
    {
        $filename = Auth::user()->student->request->project_filename;
        $path = storage_path('app/public/' . $filename);

        return response()->file($path);
    }
}
