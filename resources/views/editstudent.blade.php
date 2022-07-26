@extends('layouts.master')
<link rel="stylesheet" href="css\index.css">
@section('content')
    <div class="input_field">
        <div style="font-size: x-large; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><strong>ADD STUDENT MANUALLY</strong></div>
        <form method="POST" action="{{ route('studentupdate',['student' =>  $student->id]) }}">
            @csrf
            @method('PUT')
            <div style=" margin-top: 50px;margin-left: 420px;" class="d-flex">
                <div class="Student_Name_Class">
                    <span>Student Id</span>
                </div>
                <input style="margin-left:10px;border-radius:10px;" type="text" value="{{ $student->stud_id }}"  name="stud_id" id="stud_id" required>
                @error('stud_id')
                    <div style="background-color: none;color: red;font-size: 14px;" class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div style=" margin-top: 10px;margin-left: 420px;" class="d-flex">
                <div class="Student_Name_Class">
                    <span>Student Name</span>
                </div>
                <input style="margin-left:10px;border-radius:10px;" type="text" value="{{ $student->stud_name }}"  name="stud_name" id="stud_name" required>
                @error('stud_name')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div style=" margin-top: 10px;margin-left: 420px;" class="d-flex">
                <div class="Student_Name_Class">
                    <span>Student Email</span>
                </div>
                <input style="margin-left:10px;border-radius:10px;" type="text" value="{{ $student->stud_email }}"  name="stud_email" id="stud_email" required>
                @error('stud_email')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="" style="padding-top: 20px; margin-left: 570px;">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection