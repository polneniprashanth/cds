@extends('layouts.welcome')
@section('content2')

    <div class="Oops__Class">
		<span>Oops ...</span>
	</div>
    <div class="Certificate_Doesnt_Exist_Class">
		<span>Certificate Doesn't Exist</span>
	</div>
    <div class="Either_the_certificate_doesnt__Class">
		<span>Either the certificate doesn't exist <br/>or you would have entered a wrong code. <br/>Check the code you have entered.</span>
	</div>

    <div class="Try_Again_-_Class">
        <a href="{{ url('/verify') }}" style="color:black">Try Again-></a>
    </div>


@endsection