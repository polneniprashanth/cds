@extends('layouts.welcome')
@section('content2')

    <div class="Verify_a_Certificate_m_Class">
		<span>Request a Certificate</span>
	</div>
    <form action="{{ route('requeststore') }}" method="POST">
        @csrf
        <div style="margin-top:30px;margin-left:350px;" class="d-flex">
            <label class="Enter_the_Unique_Key_in_Certif_Class" for="stud_name">
                <span>Enter Your Name:</span>
            </label>
            <input style="position: absolute;overflow: visible;margin-top:20px;left:700px" type="text" name="stud_name" id="stud_name" required>
            @error('stud_name')
                <div  style="position: absolute;overflow: visible;left:910px" class="form-error">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div style="margin-top:30px;margin-left:350px;" class="d-flex">
            <label class="Enter_the_Unique_Key_in_Certif_Class" for="stud_id">
                <span>Enter Your Roll Number:</span>
            </label>
            <input style="position: absolute;overflow: visible;margin-top:20px;left:700px" type="text" name="stud_id" id="stud_id" required>
            @error('stud_id')
                <div  style="position: absolute;overflow: visible;left:910px" class="form-error">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div style="margin-top:30px;margin-left:350px;" class="d-flex">
            <label class="Enter_the_Unique_Key_in_Certif_Class" for="stud_email">
                <span>Enter your Email Id:</span>
            </label>
            <input style="position: absolute;overflow: visible;margin-top:20px;left:700px" type="text" name="stud_email" id="stud_email" required>
            @error('stud_email')
                <div style="position: absolute;overflow: visible;left:910px" class="form-error">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="d-flex">
            <div class="hcaptcha_Class">
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
                @error('g-recaptcha-response')
                    <div style="margin-left:10px;" class="form-error">
                        captcha required
                    </div>
                @enderror
            </div>    
            <input style="margin-top: 85px; margin-left: 250px;" class="Submit_Class" type="submit" value="Submit">
        </div>
    </form>
    <div style="margin-left:350px;margin-right:450px;font-family:Inter;font-size:18px;" style="align-text:center;">
        @if(Session::has('flash_message'))
            <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
        @endif
    </div>
@endsection