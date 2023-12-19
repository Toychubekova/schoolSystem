<?php

namespace App\Models;
use App\Models\Teacher;
use App\Models\Subject;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_id', 'teacher_id','student_id', 'date', 'start_time',
'end_time'];


    public function teacher()
       {
            return $this->belongsTo(Teacher::class);
       }

    public function subject()
       {
            return $this->belongsTo(Subject::class);
       }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}


