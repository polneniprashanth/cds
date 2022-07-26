@extends('layouts.master')
<link rel="stylesheet" href="css\index.css">
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@section('content')
    <div class="input_field">
        <div style="font-size: x-large; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><strong>Edit Course </strong></div>
        <form method="POST" action="{{ route('courseupdate',['course' => $course->id]) }}">
            @csrf
            @method('PUT')
            <div style=" margin-top: 10px;margin-left: 420px;" class="d-flex">
                <div class="Student_Name_Class">
                    <span>Course Id</span>
                </div>
                <input style="margin-left:10px;border-radius:10px;" type="text" value="{{ $course->course_id }}"  name="course_id" id="course_id" required>
                @error('course_id')
                    <div style="background-color: none;color: red;font-size: 14px;" class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div style=" margin-top: 10px;margin-left: 420px;" class="d-flex">
                <div class="Student_Name_Class">
                    <span>Course Name</span>
                </div>
                <input style="margin-left:10px;border-radius:10px;" type="text" value="{{ $course->course_name }}"  name="course_name" id="course_name" required>
                @error('course_name')
                    <div style="background-color: none;color: red;font-size: 14px;" class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div style=" margin-top: 10px;margin-left: 420px;" class="d-flex">
                <div class="Student_Name_Class">
                    <span>Instructor name</span>
                </div>
                <input style="margin-left:10px;border-radius:10px;" type="text" value="{{ $course->Instructor_name }}"  name="Instructor_name" id="Instructor_name" required>
                @error('Instructor_name')
                    <div style="background-color: none;color: red;font-size: 14px;" class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div style=" margin-top: 10px;margin-left: 420px;" class="d-flex">
                <div class="Student_Name_Class">
                    <span>Total students</span>
                </div>
                <input style="margin-left:10px;border-radius:10px;" type="number" value="{{ $course->stud_enrolled }}"  name="stud_enrolled" id="stud_enrolled" required>
                @error('stud_enrolled')
                    <div style="background-color: none;color: red;font-size: 14px;" class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div style=" margin-top: 10px;margin-left: 420px;" class="d-flex">
                <div class="Student_Name_Class">
                    <span>Course Rating</span>
                </div>
                <input style="margin-left:10px;border-radius:10px;" type="number" value="{{ $course->course_rating }}" name="course_rating" id="course_rating" required>
                @error('course_rating')
                    <div style="background-color: none;color: red;font-size: 14px;" class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div style=" margin-top: 10px;margin-left: 420px;" class="d-flex">
                <div class="Student_Name_Class">
                    <span>Course Tag1</span>
                </div>
                <input style="margin-left:10px;border-radius:10px;" type="text" value="{{ $course->Course_Tag1 }}" name="Course_Tag1" id="Course_Tag1" required>
                @error('Course_Tag1')
                    <div style="background-color: none;color: red;font-size: 14px;" class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div style=" margin-top: 10px;margin-left: 420px;" class="d-flex">
                <div class="Student_Name_Class">
                    <span>Course Tag2</span>
                </div>
                <input style="margin-left:10px;border-radius:10px;" type="text" value="{{ $course->Course_Tag2 }}" name="Course_Tag2" id="Course_Tag2" required>
                @error('Course_Tag2')
                    <div style="background-color: none;color: red;font-size: 14px;" class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div style=" margin-top: 10px;margin-left: 420px;" class="d-flex">
                <div class="Student_Name_Class">
                    <span>Course Tag3</span>
                </div>
                <input style="margin-left:10px;border-radius:10px;" type="text" value="{{ $course->Course_Tag3 }}" name="Course_Tag3" id="Course_Tag3" required>
                @error('Course_Tag3')
                    <div style="background-color: none;color: red;font-size: 14px;" class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div style=" margin-top: 10px;margin-left: 420px;" class="d-flex">
                <div class="Student_Name_Class">
                    <span>Course Tag4</span>
                </div>
                <input style="margin-left:10px;border-radius:10px;" type="text" value="{{ $course->Course_Tag4 }}" name="Course_Tag4" id="Course_Tag4" required>
                @error('Course_Tag4')
                    <div style="background-color: none;color: red;font-size: 14px;" class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div style=" margin-top: 10px;margin-left: 420px;" class="d-flex">
                <div class="Student_Name_Class">
                    <span>Course Details</span>
                </div>
                <textarea style="margin-left:10px;border-radius:10px;width:800px;height:100px" class="ckeditor form-control" value="{{ $course->course_details }}" name="course_details" id="course_details"></textarea>
                @error('course_details')
                    <div style="background-color: none;color: red;font-size: 14px;" class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="" style="padding-top: 20px; margin-left: 570px;">
                <input type="submit" value="Submit">
            </div>
        </form>
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.ckeditor').ckeditor();
            });
        </script>
    </div>
@endsection