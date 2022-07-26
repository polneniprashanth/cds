<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;


    protected $fillable = [
        'stud_name',
        'stud_id',
        'course_name',
        'score',
        'enrolled',
        'completed',
        'project_name',
        'course_instructor1',
        'course_instructor2',
        'cert_id',
        'mail',
        'certificate',
    ];

    public function students ()
    {
        return $this->belongsTo(Student::class, 'stud_id');
    }

    public function courses ()
    {
        return $this->belongsTo(Course::class, 'course_name');
    }
}
