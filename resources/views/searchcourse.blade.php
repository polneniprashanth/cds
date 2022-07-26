@extends('layouts.master')
<link rel="stylesheet" href="css\index.css">
@section('content')
    <div style="padding-top: 100px;">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <form class="example" method="GET" action="{{ route('courseshow') }}" style="margin:auto;max-width:300px">
            @csrf
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div style="margin-left:200px;margin-top:80px;">
        @if($courses->count()>0)
            <div class="d-flex">
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">Course Name</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">Course Id</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:230px;height:60px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">Instructor Name</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:200px;height:60px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">Created at</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:200px;height:60px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">Updated at</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;"></div>
            </div>
            @foreach ($courses as $course)
                <div class="d-flex">
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">{{ $course->course_name }}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">{{ $course->course_id }}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:230px;height:60px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">{{ $course->Instructor_name }}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:200px;height:60px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">{{ $course->created_at }}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:200px;height:60px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">{{ $course->updated_at }}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;font-family:Inter;font-size:15px;font-weight:600;">
                        <form class="btn" action="{{route('courseedit',['course' =>  $course->id])}}" method="GET">
                            <button style="color: rgb(232, 226, 226); background-color: rgb(39, 38, 38); font-size:18px">
                                Edit <i class="fa fa-edit"></i>
                            </button>
                        </form> 
                    </div> 
                </div>
            @endforeach
            <div style="margin-top:30px;font-family:Inter;font-weight:500;font-size:15px;">{{$courses->links("pagination::bootstrap-4")}}</div>
        @endif
    </div>
    <div class="list1">
        @yield('content1');
    </div>

@endsection
