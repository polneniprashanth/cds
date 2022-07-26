@extends('layouts.master')
<link rel="stylesheet" href="css\index.css">
@section('content')

    <div style="margin-left:200px;margin-top:80px;">
        @if($certificates->count()>0)
            <div class="d-flex">
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:80px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">Student Id</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:80px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">Student Name</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:230px;height:80px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">Course Name</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:250px;height:80px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">Unique Id</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:250px;height:80px;text-align:center;padding-top:25px;font-family:Inter;font-size:15px;font-weight:600;"></div>
            </div>
            @foreach ($certificates as $cert)
                <div class="d-flex">
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:80px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">{{ $cert->stud_name }}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:80px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">{{ $cert->stud_id }}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:230px;height:80px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">{{ $cert->course_name }}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:250px;height:80px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">{{ $cert->cert_id}}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:250px;height:80px;font-family:Inter;padding-left:28px;font-size:15px;font-weight:600;">
                        <form action="{{ route('certedit', ['certificate'=>$cert->id]) }}" method="GET">
                            @csrf
                            <button class="button">
                                Generate Certificate
                            </button>
                        </form>
                    </div> 
                </div>
            @endforeach
            <div style="margin-top:30px;font-family:Inter;font-weight:500;font-size:15px;">{{$certificates->links("pagination::bootstrap-4")}}</div>
        @else
            <div style="margin-top:100px;margin-left:280px;font-family:Inter;font-weight:600;font-size:40px;">All the certificates were generated!</div>
        @endif
    </div>   
@endsection