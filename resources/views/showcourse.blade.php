<!-- @extends('searchcourse')
@section('content1')
    @if($courses->count()>0)
        @foreach ($courses as $course)
            <div class="list">
                <pre>
                <div class="d-flex">
                    <p class="details1">Course ID       :</p>
                    <p class="details">{{ $course->course_id }}</p>
                </div>
                <div class="d-flex">
                    <p class="details1">course Name     :</p>
                    <p class="details">{{ $course->course_name }}</p>
                </div>
                <div class="d-flex">
                    <p class="details1">Instructor name :</p>
                    <p class="details">{{ $course->Instructor_name }}</p>
                </div>
                <div class="d-flex">
                    <p class="details1">Total students  :</p>
                    <p class="details">{{ $course->stud_enrolled }}</p>
                </div>
                <div class="d-flex">
                    <p class="details1">Rating          :</p>
                    <p class="details">{{ $course->course_rating }}</p>
                </div>
                <div class="d-flex">
                    <p class="details1">Course_details  :</p>
                    <p class="details">{!!$course->course_details!!}</p>
                </div>
                <div class="d-flex">
                    <p class="details1">Course Tag1     :</p>
                    <p class="details">{{ $course->Course_Tag1 }}</p>
                </div>
                <div class="d-flex">
                    <p class="details1">Course Tag2     :</p>
                    <p class="details">{{ $course->Course_Tag2 }}</p>
                </div>
                <div class="d-flex">
                    <p class="details1">Course Tag3     :</p>
                    <p class="details">{{ $course->Course_Tag3 }}</p>
                </div>
                <div class="d-flex">
                    <p class="details1">Course Tag4     :</p>
                    <p class="details">{{ $course->Course_Tag4 }}</p>
                </div>
            </pre>
                <form class="btn" action="{{route('courseedit',['course' =>  $course->id])}}" method="GET">
                    <button style="color: rgb(232, 226, 226); background-color: rgb(39, 38, 38); font-size:18px">
                        Edit <i class="fa fa-edit"></i>
                    </button>
                </form> 
            </div>
            @endforeach
    @else 
        <div>
            <h2>No posts found</h2>
        </div>
    @endif
@endsection -->