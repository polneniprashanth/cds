<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\Course;
use mikehaertl\pdftk\Pdf;

class CertificateGeneratorController extends Controller
{
    public function show(){
        $certificates=Certificate::query()
                    ->whereNull('certificate')
                    ->paginate(5);
        return view('showcertificate', ['certificates'=>$certificates]);
    }

    public function view(){
        $certificates=Certificate::paginate(5);
        return view('searchcertificate', ['certificates'=>$certificates]);   
    }
    public function edit($certificate){
        $certificate=Certificate::findorFail($certificate);
        $course=Course::query()
                ->where('course_name', '=', $certificate->course_name)
                ->first();
        $filename = public_path().'/templates/'.$course->template;
        
        $pdf = new Pdf($filename);
        $fields = $pdf->getDataFields();
        $fields = $fields->__toArray();
        return view('editcert', ['fields'=>$fields,'certificate'=>$certificate]);
    }  


    public function create(Request $request,$certificate){
        $certificate=Certificate::findorFail($certificate);
        $course=Course::query()
                ->where('course_name', '=', $certificate->course_name)
                ->first();
        $filename = public_path().'/templates/'.$course->template;
        $pdf = new Pdf($filename);

        $inputs = $request->all();
        unset($inputs['_token']);
        foreach ($inputs as $field=>$value) {
        $data[str_replace('_',' ',$field)] = $value;
        }

        $pdf->fillForm($data)
            ->needAppearances()
            ->flatten();

        $name=$certificate->cert_id;
        $name =$name . '.pdf';
        $pdf->saveAs(public_path().'/certificates/'.$name);
        $certificate->certificate = $name;
        $certificate->save();
        return redirect()->route('home');
    } 
    public function delete($id)
    {
        $certificate=Certificate::findorFail($id);
        $certificate->delete();
        return back();
    }
}
