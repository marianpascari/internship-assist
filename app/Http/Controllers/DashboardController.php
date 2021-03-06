<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('student')) {
            return view('studentdashboard');
        } elseif (Auth::user()->hasRole('professor')) {
            return view('professordashboard');
        } elseif (Auth::user()->hasRole('administrator')) {
            return view('dashboard');
        }
    }

    public function myprofile()
    {
        return view('myprofile');
    }

    public function getUsers()
    {
        $users = User::all();

        return view('users', [
            'users' => $users
        ]);
    }

    public function getRequests()
    {
        $requests = \App\Models\Request::where('status', 2)->get();
        $acceptedRequests = \App\Models\Request::where('status', 3)->get();

        return view('requests', [
            'requests' => $requests,
            'acceptedRequests' => $acceptedRequests
        ]);
    }
}
