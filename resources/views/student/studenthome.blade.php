@extends('layouts.welcome')
@section('content2')
    <div class="home-contents">
        <div class="The_Skill_Crafts_Class">
            The Skill Craft's
        </div>
        <div class="Certificate_Delivery_System_Class">
            <span>Certificate Delivery System</span>
        </div>
        <div class="An_in-house_web_application__d_Class">
		    <span>An in-house web application <br/>delivering and verifying our <br/>student's Course Achievements </span>
	    </div>
        <div class="d-flex" style="margin-left:620px">
            <div class="Powered_by_Class">
                <span>Powered by</span>
            </div>
            <img class="laravel_Class" src="/laravel.png" srcset="laravel.png 1x">
        </div>
        <div class="d-flex" style="margin-top:20px;">
            <div class="Verify_a_Certificate_-_Class">
		        <a href="{{ url('/verify') }}" style="color:black">Verify a Certificate -></a>
	        </div>
            <div class="Request_Your_Cerificate_-_Class">
		        <a href="{{ url('/request') }}" style="color:black">Request Your Cerificate -></a>
	        </div>
        </div>
    </div>
@endsection