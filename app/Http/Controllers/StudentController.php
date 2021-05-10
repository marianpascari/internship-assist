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
        $filename = $file->getClientOriginalName();

        $path = $file->storeAs('public', $filename);

        $thisrequest = new \App\Models\Request();
        $thisrequest->title = $request->get('title');
        $thisrequest->student_id = Auth::user()->student->id;
        $thisrequest->filename = $filename;
        $thisrequest->status = 1;
        $thisrequest->save();

        return redirect()->route('dashboard');
    }

    public function showUpload()
    {
        //$content = Storage::get('public/Sigla-USV-standard-centrat.png');
        //$path = public_path('storage/Sigla-USV-standard-centrat.png');
        $path = storage_path('app/public/Conventie Practica_Pacari Constantin Marian.pdf');

        //echo asset('storage/Sigla-USV-standard-centrat.png');
       return response()->file($path);
    }
}
