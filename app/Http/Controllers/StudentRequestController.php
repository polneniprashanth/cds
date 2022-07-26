<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentRequest;

class StudentRequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'stud_id' => ['required', 'string'],
            'stud_name' => ['required', 'string'],
            'stud_email' => ['required', 'email'],
            'g-recaptcha-response' => 'captcha|required',
        ]);

        $student= new StudentRequest();

        $student->student_id = strip_tags($request->input('stud_id'));
        $student->student_name = strip_tags($request->input('stud_name'));
        $student->student_email = strip_tags($request->input('stud_email'));

        $student->save();
        \Session::flash('flash_message','Your Request is sent successfully');
        return back();
    }
    public function delete($id)
    {
        $student=StudentRequest::findorFail($id);
        $student->delete();
        return back();
    }
}
