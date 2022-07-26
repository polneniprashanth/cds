<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Validation\Rule;
use Session;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'stud_id' => ['required', 'string', 'unique:students'],
            'stud_name' => ['required', 'string'],
            'stud_email' => ['required', 'email', 'unique:students'],
        ]);

        $student= new Student();

        $student->stud_id = strip_tags($request->input('stud_id'));
        $student->stud_name = strip_tags($request->input('stud_name'));
        $student->stud_email = strip_tags($request->input('stud_email'));

        $student->save();

        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $search = $request->input('search');

        $students=Student::query()
            ->where('stud_id' , 'LIKE' , "%{$search}%")
            ->orwhere('stud_name' , 'LIKE' , "%{$search}%")
            ->orwhere('stud_email' , 'LIKE' , "%{$search}%")
            ->paginate(5);

        
        
        return view('searchstudent',[
            'students'=>$students,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($student)
    {
        
        return view('editstudent',[
            'student'=>Student::findorFail($student),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $student)
    {
       
        $students=Student::findorFail($student);
        
        $request->validate([
            'stud_id' => ['required', 'string', Rule::unique('students','stud_id')->ignore($students)],
            'stud_name' => ['required', 'string'],
            'stud_email' => ['required', 'string',Rule::unique('students','stud_email')->ignore($students)],
        ]);

        $students->stud_id = strip_tags($request->input('stud_id'));
        $students->stud_name = strip_tags($request->input('stud_name'));
        $students->stud_email = strip_tags($request->input('stud_email'));
        
        $students->update();
        
        \Session::flash('flash_message','Updated Successfully.');
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
