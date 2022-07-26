<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Course;
use Session;

class CourseController extends Controller
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
            'course_id' => ['required', 'string', 'unique:courses'],
            'course_name' => ['required', 'string', 'unique:courses'],
            'Instructor_name' => ['required', 'string'],
            'stud_enrolled' => ['required', 'integer'],
            'course_rating' => ['required', ],
            'Course_Tag1' => ['string'],
            'Course_Tag2' => ['string'],
            'Course_Tag3' => ['string'],
            'Course_Tag4' => ['string'],
        ]);
        $course= new Course();

        $course->course_id = strip_tags($request->input('course_id'));
        $course->course_name = strip_tags($request->input('course_name'));
        $course->Instructor_name = strip_tags($request->input('Instructor_name'));
        $course->stud_enrolled = strip_tags($request->input('stud_enrolled'));
        $course->course_rating = strip_tags($request->input('course_rating'));
        $course->course_details = $request->input('course_details');
        $course->Course_Tag1 = strip_tags($request->input('Course_Tag1'));
        $course->Course_Tag2 = strip_tags($request->input('Course_Tag2'));
        $course->Course_Tag3 = strip_tags($request->input('Course_Tag3'));
        $course->Course_Tag4 = strip_tags($request->input('Course_Tag4'));

        $file=$request->file('file');
        $name=$course->course_name;
        $name =$name . '.pdf';
        $file->move('templates', $name);
        $course->template = $name;

        $course->save();

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

        $courses=Course::query()
            ->where('course_id' , 'LIKE' , "%{$search}%")
            ->orwhere('course_name' , 'LIKE' , "%{$search}%")
            ->orwhere('Instructor_name' , 'LIKE' , "%{$search}%")
            ->orwhere('Course_Tag1' , 'LIKE' , "%{$search}%")
            ->orwhere('Course_Tag2' , 'LIKE' , "%{$search}%")
            ->orwhere('Course_Tag3' , 'LIKE' , "%{$search}%")
            ->orwhere('Course_Tag4' , 'LIKE' , "%{$search}%")
            ->paginate(5);

            

        
        return view('searchcourse',[
            'courses'=>$courses,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($course)
    {
        return view('editcourse',[
            'course'=>Course::findorFail($course),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $course)
    {
        $course=Course::findorFail($course);

        $request->validate([
            'course_id' => ['required', 'string', Rule::unique('courses','course_id')->ignore($course)],
            'course_name' => ['required', 'string', Rule::unique('courses','course_name')->ignore($course)],
            'Instructor_name' => ['required', 'string'],
            'stud_enrolled' => ['required', 'integer'],
            'course_rating' => ['required', ],
            'Course_Tag1' => ['string'],
            'Course_Tag2' => ['string'],
            'Course_Tag3' => ['string'],
            'Course_Tag4' => ['string'],
        ]);

        $course->course_id = strip_tags($request->input('course_id'));
        $course->course_name = strip_tags($request->input('course_name'));
        $course->Instructor_name = strip_tags($request->input('Instructor_name'));
        $course->stud_enrolled = strip_tags($request->input('stud_enrolled'));
        $course->course_rating = strip_tags($request->input('course_rating'));
        $course->course_details = $request->input('course_details');
        $course->Course_Tag1 = strip_tags($request->input('Course_Tag1'));
        $course->Course_Tag2 = strip_tags($request->input('Course_Tag2'));
        $course->Course_Tag3 = strip_tags($request->input('Course_Tag3'));
        $course->Course_Tag4 = strip_tags($request->input('Course_Tag4'));

        $course->update();

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
