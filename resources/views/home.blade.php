@extends('layouts.master')
<link rel="stylesheet" href="css\index.css">
@section('content')
    <!-- <table>
        @if($requests->count()>0)
            <span style="font-family:Inter;font-size:50px;font-weight:400;margin-left:100px;margin-top:40px;">Requests</span>
            @foreach($requests as $request)
                <tr>
                    <td class="name-field">{{$request->stud_name}}</td>
                    <td class="name-field">{{$request->stud_id}}</td>
                    <td class="name-field">{{$request->stud_email}}</td>
                    <td>
                        <form action="{{ route('deleterequest', ['id'=>$request->id]) }}" method="POST">
                            @csrf
                            <button class="button">
                                Clear
                            </button>
                        </form> 
                    </td>
                </tr>
            @endforeach
        @else
        <h1>No Requests pending!</h1>
        @endif
    </table> -->
    
    <div class="d-flex">
        <div style="margin-left:100px" class="count_box_requests">
            <div style="font-family:Inter;font-weight:400;font-size:20px;text-align:center">No of Requests pending</div>
            <div style="font-family:Inter;font-weight:900;font-size:70px;text-align:center;">{{ $requests->count() }}</div>
        </div>
        <div style="margin-left:100px" class="count_box_requests">
            <div style="font-family:Inter;font-weight:400;font-size:20px;text-align:center">No of Certificates generated</div>
            <div style="font-family:Inter;font-weight:900;font-size:70px;text-align:center;">{{ $certificates->count() }}</div>
        </div>
    </div>
    <div style="margin-left:200px;margin-top:80px;">
        <div style="font-family:Inter;font-weight:500;font-size:25px;">Requests</div>
        @if($requests->count()>0)
            <div class="d-flex">
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">Name</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">Roll No</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:230px;height:60px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">Email Id</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;"></div>
            </div>
            @foreach ($requests as $request)
                <div class="d-flex">
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">{{ $request->student_name }}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">{{ $request->student_id }}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:230px;height:60px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">{{ $request->student_email }}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:60px;font-family:Inter;padding-left:35px;font-size:15px;font-weight:600;">
                        <form action="{{ route('deleterequest', ['id'=>$request->id]) }}" method="POST">
                            @csrf
                            <button style="height:40px;padding-top:10px;" class="button">
                                Clear
                            </button>
                        </form> 
                    </div> 
                </div>
            @endforeach
            <div style="margin-top:30px;font-family:Inter;font-weight:500;font-size:15px;">{{$requests->links("pagination::bootstrap-4")}}</div>
        @endif
    </div>
@endsection
