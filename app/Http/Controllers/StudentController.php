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
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        if (finfo_file($finfo, $file) == "application/pdf") {
            $filename = $file->getClientOriginalName();

            $path = $file->storeAs('public', $filename);

            $thisrequest = new \App\Models\Request();
            $thisrequest->title = $request->get('title');
            $thisrequest->student_id = Auth::user()->student->id;
            $thisrequest->filename = $filename;
            $thisrequest->status = 1;
            $thisrequest->save();

        }

        return redirect()->route('dashboard.createrequest');
    }

    public function deleteRequest(Request $request)
    {
        $filename = Auth::user()->student->request->filename;

        Storage::delete('public/' . $filename);
        Auth::user()->student->request->delete();

        return redirect()->route('dashboard');
    }

    public function showUpload()
    {
        $filename = Auth::user()->student->request->filename;
        $path = storage_path('app/public/' . $filename);

        return response()->file($path);
    }
}
