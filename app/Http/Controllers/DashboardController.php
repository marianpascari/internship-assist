<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('student'))
        {
            return view('studentdashboard');
        }elseif(Auth::user()->hasRole('professor'))
        {
            return view('professordashboard');
        }elseif(Auth::user()->hasRole('administrator'))
        {
            return view('dashboard');
        }
    }

    public function myprofile()
    {
        return view('myprofile');
    }
}
