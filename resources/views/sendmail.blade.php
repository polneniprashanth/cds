@extends('layouts.master')
<link rel="stylesheet" href="css\index.css">
@section('content')

    <div style="padding-top: 100px;">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <form class="example" method="GET" action="{{ route('certshow') }}" style="margin:auto;max-width:300px">
            @csrf
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div style="margin-left:200px;margin-top:80px;">
        @if($certificates->count()>0)
            <div class="d-flex">
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:80px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">Student Id</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:80px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">Student Name</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:230px;height:80px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">Course Name</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:200px;height:80px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">Unique Id</div>
                <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:180px;height:80px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;"></div>
            </div>
            @foreach ($certificates as $cert)
                <div class="d-flex">
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:80px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">{{ $cert->stud_name }}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:150px;height:80px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">{{ $cert->stud_id }}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:230px;height:80px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">{{ $cert->course_name }}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:200px;height:80px;text-align:center;padding-top:15px;font-family:Inter;font-size:15px;font-weight:600;">{{ $cert->cert_id}}</div>
                    <div style="margin-top:0.5px;margin-left:0.5px;border:1px solid black;width:180px;height:80px;font-family:Inter;padding-left:30px;font-size:15px;font-weight:600;">
                        <form action="{{ route('sendmail', ['certificate'=>$cert->id]) }}" method="POST">
                            @csrf
                            <button class="button">
                                Send Mail
                            </button>
                        </form> 
                    </div> 
                </div>
            @endforeach
            <div style="margin-top:30px;font-family:Inter;font-weight:500;font-size:15px;">{{$certificates->links("pagination::bootstrap-4")}}</div>
        @endif
        @if(Session::has('flash_message'))
            <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
        @endif
    </div> 
    

@endsection
