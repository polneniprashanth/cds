<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CertificatesImport;
use Illuminate\Support\Facades\Session;
use App\Models\Course;
use App\Models\Student;
use App\Models\Certificate;
use App\Models\StudentRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\DynamicEmail;
use Illuminate\Support\Facades\Config;
use DB;



class CertificatesImportController extends Controller
{
    public function show()
    {
        return view('addbulk');
    }

    public function store(Request $request)
    {
        $file= $request->file('file');

        (new CertificatesImport)->import($file);

        return back()->withStatus('File imported Successfully');
    }

    public function generate()
    {
        return back();
    }
    public function showcert(){
        $certificates=Certificate::query()
                    ->where('mail' , '=' , 'no')
                    ->whereNotNull('certificate')
                    ->paginate(5);
        return view('sendmail', ['certificates'=>$certificates]);
    }
    public function certshow(Request $request)
    {
        $search = $request->input('search');
        $certificates=Certificate::query()
                        ->where('stud_id', 'LIKE',  '%' .$search. '%')      
                        ->orwhere('course_name', 'LIKE',  '%' .$search. '%')  
                        ->paginate(5);
        return view('sendmail', ['certificates'=>$certificates]);
    }

    public function composemail($certificate)
    {
        $cert=Certificate::findorFail($certificate);
        $student=Student::query()
                ->where('stud_id', '=', $cert->stud_id)
                ->first();
        
        $data   =   $cert;
        
        Mail::to($student->stud_email)->send(new DynamicEmail($data));

        if( Mail::flushMacros() > 0 ) {
            \Session::flash('flash_message','E-mail not sent successfully!');
            return back();
        }

        else {
            $cert->mail="yes";
            $cert->update();
            \Session::flash('flash_message','E-mail sent successfully!');
            return back();
        }

    }
    public function sendall(){
        $certificates=Certificate::query()
            ->where('mail' , '=' , 'no')
            ->get();
        foreach($certificates as $certificate){
            $cert=Certificate::findorFail($certificate->id);
            $student=Student::query()
                    ->where('stud_id', '=', $cert->stud_id)
                    ->first();
            
            $data   =   $cert;
            Mail::to($student->stud_email)->send(new DynamicEmail($data));
            $cert->mail="yes";
            $cert->update();
        }
        return back();
    }
    public function download()
    {
        $file_path = public_path('sample.xlsx');
        return response()->download($file_path);
    }
}
