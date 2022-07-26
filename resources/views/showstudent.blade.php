<!-- @extends('searchstudent')
@section('content1')
    <div style="margin-left:200px;margin-top:80px;">
        @if($students->count()>0)
            <div class="d-flex">
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;text-align:center;align-itmes:center;padding-top:10px;font-family:Inter;font-size:15px;font-weight:600;">Student Name</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;text-align:center;align-itmes:center;padding-top:10px;font-family:Inter;font-size:15px;font-weight:600;">Student Id</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:220px;height:60px;text-align:center;align-itmes:center;padding-top:10px;font-family:Inter;font-size:15px;font-weight:600;">Student Email</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;text-align:center;align-itmes:center;padding-top:10px;font-family:Inter;font-size:15px;font-weight:600;">Created at</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;text-align:center;align-itmes:center;padding-top:10px;font-family:Inter;font-size:15px;font-weight:600;">Updated at</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;text-align:center;align-itmes:center;padding-top:10px;font-family:Inter;font-size:15px;font-weight:600;"></div>
            </div>
            @foreach ($students as $student)
                <div class="d-flex">
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;text-align:center;align-itmes:center;padding-top:10px;font-family:Inter;font-size:15px;font-weight:600;">{{ $student->stud_name }}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;text-align:center;align-itmes:center;padding-top:10px;font-family:Inter;font-size:15px;font-weight:600;">{{ $student->stud_id }}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:220px;height:60px;text-align:center;align-itmes:center;padding-top:10px;font-family:Inter;font-size:15px;font-weight:600;">{{ $student->stud_email }}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;text-align:center;align-itmes:center;padding-top:10px;font-family:Inter;font-size:15px;font-weight:600;">{{ $student->created_at }}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;text-align:center;align-itmes:center;padding-top:10px;font-family:Inter;font-size:15px;font-weight:600;">{{ $student->updated_at }}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;text-align:center;align-itmes:center;padding-top:10px;font-family:Inter;font-size:15px;font-weight:600;">
                        <form class="btn" action="{{route('studentedit',['student' =>  $student->id])}}" method="GET">
                            <button style="color: rgb(232, 226, 226); background-color: rgb(39, 38, 38); font-size:18px">
                                Edit <i class="fa fa-edit"></i>
                            </button>
                        </form> 
                    </div> 
                </div>
            @endforeach
            <div>{{$students->links()}}</div>
        @endif
@endsection -->