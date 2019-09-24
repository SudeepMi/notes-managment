<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

    public function index(){
        return view('student.home');
    }

    public function ActiveNotice(){
        return view('student.notactive');
    }
}
