@extends('layouts.welcome')
@section('content2')

    <div class="Verify_a_Certificate_m_Class">
		<span>Verify a Certificate</span>
	</div>
    <form action="{{ route('verifycode') }}" method="GET">
        @csrf
        <div style="margin-top:50px;margin-left:350px;" class="d-flex" style="margin-top:50px">
            <label class="Enter_the_Unique_Key_in_Certif_Class" for="cert_id">
                <span>Enter the Unique Key in Certificate:</span>
            </label>
            <input style="width:300px;margin-top:22px" type="text" name="cert_id" id="cert_id" required>
        </div>
        <div class="d-flex">
            <div class="hcaptcha_Class">
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
                @error('g-recaptcha-response')
                    <div class="form-error">
                        captcha required
                    </div>
                @enderror
            </div>    
            <input style="margin-top: 85px; margin-left: 250px;" class="Submit_Class" type="submit" value="Submit">
        </div>
    </form>
@endsection