<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;

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

    public function documentsPage()
    {
        return view('documents');
    }

    public function createDeclaratieEtica()
    {
        return view('declaratieetica');
    }

    public function downloadDeclaratieEtica(Request $request)
    {
        $templateProcessor = new TemplateProcessor('templates/etica.docx');
        $templateProcessor->setValue('last_name', $request->get('last_name'));
        $templateProcessor->setValue('first_name', $request->get('first_name'));
        $templateProcessor->setValue('serie', $request->get('serie'));
        $templateProcessor->setValue('numar', $request->get('numar'));
        $templateProcessor->setValue('program', $request->get('program'));
        $templateProcessor->setValue('promotie', $request->get('promotie'));
        $templateProcessor->setValue('sesiune', $request->get('sesiune'));
        $templateProcessor->setValue('data', $request->get('data'));

        $fileName = $request->get('last_name') . $request->get('first_name');
        $templateProcessor->saveAs($fileName . '.docx');
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
    }

    public function createDeclaratieAutenticitate()
    {
        return view('declaratieautenticitate');
    }

    public function downloadDeclaratieAutenticitate(Request $request)
    {
        $templateProcessor = new TemplateProcessor('templates/autenticitate.docx');
        $templateProcessor->setValue('last_name', $request->get('last_name'));
        $templateProcessor->setValue('first_name', $request->get('first_name'));
        $templateProcessor->setValue('domiciliu', $request->get('domiciliu'));
        $templateProcessor->setValue('judet', $request->get('judet'));
        $templateProcessor->setValue('strada', $request->get('strada'));
        $templateProcessor->setValue('nr', $request->get('nr'));
        $templateProcessor->setValue('data_nastere', $request->get('data_nastere'));
        $templateProcessor->setValue('identificat', $request->get('identificat'));
        $templateProcessor->setValue('serie', $request->get('serie'));
        $templateProcessor->setValue('numar', $request->get('numar'));
        $templateProcessor->setValue('program', $request->get('program'));
        $templateProcessor->setValue('perioada', $request->get('perioada'));
        $templateProcessor->setValue('titlu', $request->get('titlu'));
        $templateProcessor->setValue('data', $request->get('data'));
        $templateProcessor->setValue('coordonator', $request->get('coordonator'));

        $fileName = $request->get('last_name') . $request->get('first_name');
        $templateProcessor->saveAs($fileName . '.docx');
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
    }

    public function createCerereInscriere()
    {
        return view('cerereinscriere');
    }

    public function downloadCerereInscriere(Request $request)
    {
        $templateProcessor = new TemplateProcessor('templates/cerereinscriere.docx');
        $templateProcessor->setValue('last_name', $request->get('last_name'));
        $templateProcessor->setValue('first_name', $request->get('first_name'));
        $templateProcessor->setValue('cnp', $request->get('cnp'));
        $templateProcessor->setValue('promotie', $request->get('promotie'));
        $templateProcessor->setValue('program', $request->get('program'));
        $templateProcessor->setValue('sesiune', $request->get('sesiune'));
        $templateProcessor->setValue('tema', $request->get('tema'));
        $templateProcessor->setValue('coordonator', $request->get('coordonator'));
        $templateProcessor->setValue('telefon', $request->get('telefon'));
        $templateProcessor->setValue('email', $request->get('email'));
        $templateProcessor->setValue('data', $request->get('data'));

        $fileName = $request->get('last_name') . $request->get('first_name');
        $templateProcessor->saveAs($fileName . '.docx');
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
    }
}
