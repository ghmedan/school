<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function dashboard()
    {
        return view('dashboard');
    }

    public function index()
    {
        return view('auth.selection');
    }
    public function students()
    {
        return view('Students.dashboard');
    }
}
