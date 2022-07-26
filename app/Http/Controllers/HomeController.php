<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentRequest;
use App\Models\Certificate;
use App\Models\Student;
use App\Models\Course;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $requests=StudentRequest::paginate(5);
        $certificates=Certificate::query()
                    ->whereNotNull('certificate')
                    ->get();
        return view('home',['requests'=>$requests, 'certificates'=>$certificates]);
    }

    public function addstudent()
    {
        return view('addstudent');
    }

    public function searchstudent()
    {
        $students=Student::paginate(5);
        return view('searchstudent',['students'=>$students]);
    }

    public function addcourse()
    {
        return view('addcourse');
    }

    public function searchcourse()
    {
        $courses=Course::paginate(5);
        return view('searchcourse',['courses'=>$courses]);
    }

    public function settings()
    {
        return view('settings');
    }
}
