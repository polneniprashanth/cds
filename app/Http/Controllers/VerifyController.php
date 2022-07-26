<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Certificate;
use Illuminate\Support\Facades\Redis;

class VerifyController extends Controller
{
    public function verify(Request $request)
    {
        $request->validate([
            'cert_id'=>['required', 'string'],
            'g-recaptcha-response' => 'captcha|required',
        ]);
        $cert=$request->input('cert_id');
        $certificate=Certificate::query()
                    ->where('cert_id', '=', $cert)
                    ->first();
        if(is_null($certificate)){
            return view('student.notexist');
        }
        return redirect()->route('showverify', ['certificate'=>$cert]);
    }
    public function show($certificate)
    {
        $certificate=Certificate::query()
                    ->where('cert_id', '=', $certificate)
                    ->first();
        if(is_null($certificate)){
            return view('student.notexist');
        }
        $course=Course::query()
                    ->where('course_name', '=', $certificate->course_name)
                    ->first();
        return view('student.showverify',['certificate'=>$certificate, 'course'=>$course]);

    }
    public function download($certificate)
    {
        $certificate=Certificate::query()
                    ->where('cert_id', '=', $certificate)
                    ->first();
        if(is_null($certificate)){
            return view('student.notexist');
        }
        $file_path = public_path('certificates/'.$certificate->certificate);
        return response()->download($file_path);
    }
}
