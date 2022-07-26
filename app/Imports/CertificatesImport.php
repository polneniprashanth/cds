<?php

namespace App\Imports;

use App\Models\Certificate;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class CertificatesImport implements 
ToModel,
SkipsOnFailure,
WithHeadingRow
{
    use Importable, SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $certificate=new Certificate([
                        'stud_id'=>$row['roll'],
                        'stud_name'=>$row['name'],
                        'course_name'=>$row['course'],
                        'score'=>$row['score'],
                        'enrolled'=>$row['enrolled'],
                        'completed'=>$row['completed'],
                        'project_name'=>$row['project'],
                        'course_instructor1'=>$row['instructor1'],
                        'course_instructor2'=>$row['instructor2'],
                        'cert_id'=>Str::uuid(),
                        
                    ]);
        $certificate->mail="no";
        redirect()->route('generate')->with(['certificate'=>$certificate]);
        return $certificate;
    }
}
