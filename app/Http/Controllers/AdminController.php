<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createStudent()
    {
        return view('createstudent');
    }
}
